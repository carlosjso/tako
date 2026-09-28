<?php

namespace App\Http\Controllers;

use App\Actions\RegisterPaymentAction;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
use App\Models\Payment;
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
