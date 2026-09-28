<?php

namespace App\Http\Api\Payments\Controllers;

use App\Domain\Payments\Actions\RegisterPaymentAction;
use App\Domain\Orders\Models\Order;
use App\Domain\Payments\Models\Payment;
use App\Http\Api\Controller;
use App\Http\Api\Payments\Requests\StorePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(string $orderId)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);
        
        return $order->payments;
    }

    public function store(StorePaymentRequest $request, string $orderId, RegisterPaymentAction $action)
    {
        $payment = $action->execute($orderId, $request->validated());

        return response()->json($payment, 201);
    }

    public function show(string $id)
    {
        return Payment::forCurrentBusiness()->findOrFail($id);
    }
}
