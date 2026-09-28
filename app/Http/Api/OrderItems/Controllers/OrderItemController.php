<?php

namespace App\Http\Api\OrderItems\Controllers;

use App\Domain\OrderItems\Actions\AddOrderItemAction;
use App\Domain\OrderItems\Actions\CancelOrderItemAction;
use App\Domain\OrderItems\Models\OrderItem;
use App\Domain\Orders\Models\Order;
use App\Domain\Products\Models\Product;
use App\Http\Api\Controller;
use App\Http\Api\OrderItems\Requests\CancelOrderItemRequest;
use App\Http\Api\OrderItems\Requests\StoreOrderItemRequest;
use App\Http\Api\OrderItems\Requests\UpdateOrderItemRequest;
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
