<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Actions\CancelOrderAction;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return Order::forCurrentBusiness()->get();
    }

    public function store(StoreOrderRequest $request)
    {
        $currentWorkShift = Auth::user()->workShifts()
            ->whereNull('clock_out')
            ->latest()
            ->first();

        if (! $currentWorkShift) {
            return response()->json(['message' => 'No tienes un turno abierto.'], 409);
        }

        $order = new Order($request->validated());
        $order->business_id = Auth::user()->business_id;
        $order->work_shift_id = $currentWorkShift->id;
        $order->save();

        return response()->json($order, 201);

    }

    public function show(string $id)
    {
        return Order::forCurrentBusiness()->findOrFail($id);
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = Order::forCurrentBusiness()->findOrFail($id);
        $order->update($request->validated());

        return $order;
    }

    public function cancelOrder(string $id, CancelOrderAction $action)
    {
        $order = $action->execute($id);

        return $order;
    }
}
