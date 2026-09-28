<?php

namespace App\Domain\Payments\Actions;

use App\Domain\CashRegisterSessions\Models\CashRegisterSession;
use App\Domain\Exceptions\BusinessRuleException;
use App\Domain\Orders\Models\Order;
use App\Domain\Payments\Models\Payment;
use Illuminate\Support\Facades\DB;

class RegisterPaymentAction
{
    public function execute(string $orderId, array $data) {
        return DB::transaction(function () use ($orderId, $data) {
            $order = Order::forCurrentBusiness()->lockForUpdate()->findOrFail($orderId);

            if (in_array($order->status, ['paid', 'cancelled'])) {
                throw new BusinessRuleException('No se puede pagar esta orden.');
            }

            $session = CashRegisterSession::forCurrentBusiness()
                ->forCurrentUser()
                ->whereNull('closed_at')
                ->first();

            if (! $session) {
                throw new BusinessRuleException('Necesitas una sesión de caja abierta para registrar pagos.');
            }

            $subtotal = (int) $order->orderItems()
                ->where('status', '!=', 'cancelled')
                ->sum(DB::raw('quantity * unit_price_at_sale'));
            $total = $subtotal - $order->discount_amount;
            $paid = (int) $order->payments()->sum('amount');
            $pending = $total - $paid;
            $amount = (int) $data['amount'];

            if ($total <= 0) {
                throw new BusinessRuleException('La orden no tiene nada que cobrar.');
            }

            if ($amount > $pending) {
                throw new BusinessRuleException('El monto excede el saldo pendiente de la orden', 422);
            }

            $payment = new Payment($data);
            $payment->business_id = $order->business_id;
            $payment->order_id = $order->id;
            $payment->cash_register_session_id = $session->id;
            $payment->save();
            
            if ($amount === $pending) {
                $order->markAsPaid();
            }

            return $payment;
        });
    }
}
