<?php

namespace App\Http\Controllers;

use App\Actions\AddOrderItemAction;
use App\Actions\CancelOrderItemAction;
use App\Http\Requests\CancelOrderItemRequest;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(string $orderId)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);

        return $order->orderItems;
    }

    public function store(StoreOrderItemRequest $request, string $orderId, AddOrderItemAction $action)
    {
        $item = $action->execute($orderId, $request->validated());

        return response()->json($item, 201);
    }

    public function show(string $orderId, string $id)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);

        return $order->orderItems()->findOrFail($id);
    }

    public function update(UpdateOrderItemRequest $request, string $orderId, string $id)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);

        $item = $order->orderItems()->findOrFail($id);
        $item->update($request->validated());

        return $item;
    }

    public function cancelItemOrder(CancelOrderItemRequest $request, string $orderId, string $id, CancelOrderItemAction $action)
    {
        $item = $action->execute($orderId, $id, $request->validated());

        return $item;
    }
}
