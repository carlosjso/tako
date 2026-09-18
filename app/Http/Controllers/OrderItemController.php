<?php

namespace App\Http\Controllers;

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

    public function store(StoreOrderItemRequest $request, string $orderId)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);
        $product = Product::findOrFail($request->validated('product_id'));

        $item = new OrderItem($request->validated());
        $item->order_id = $order->id;
        $item->unit_price_at_sale = $product->sale_price;
        $item->unit_cost_at_sale = $product->production_cost;
        $item->save();

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

    public function cancelItemOrder(CancelOrderItemRequest $request, string $orderId, string $id)
    {
        $order = Order::forCurrentBusiness()->findOrFail($orderId);
        $item = $order->orderItems()->findOrFail($id);

        if (in_array($item->status, ['paid', 'cancelled'])) {
            return response()->json(['message' => 'No se puede cancelar esta orden.'], 409);
        }

        $item->update($request->validated());
        $item->status = 'cancelled';
        $item->closed_at = Carbon::now();
        $item->save();

        return $item;
    }
}
