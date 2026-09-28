<?php

namespace App\Domain\OrderItems\Actions;

use App\Domain\Exceptions\BusinessRuleException;
use App\Domain\InventoryMovements\Actions\RecordInventoryMovementAction;
use App\Domain\OrderItems\Models\OrderItem;
use App\Domain\Orders\Models\Order;
use App\Domain\Products\Models\Product;
use Illuminate\Support\Facades\DB;

class AddOrderItemAction
{
    public function __construct(
        private RecordInventoryMovementAction $recordInventoryMovementAction
    ) {}

    public function execute(string $orderId, array $data)
    {
        return DB::transaction(function () use ($orderId, $data) {
            $order = Order::forCurrentBusiness()->findOrFail($orderId);
            $product = Product::forCurrentBusiness()->findOrFail($data['product_id']);

            if (in_array($order->status, ['paid', 'cancelled'])) {
                throw new BusinessRuleException('No se puede agregar un item a esta orden.');
            }

            $item = new OrderItem($data);
            $item->order_id = $order->id;
            $item->unit_price_at_sale = $product->sale_price;
            $item->unit_cost_at_sale = $product->production_cost;
            $item->save();

            if ($product->track_inventory) {
                $this->recordInventoryMovementAction->execute(
                    $product->id,
                    [
                        'quantity_change' => -$item->quantity, 
                        'reason' => 'sale',
                    ],
                    $item->id,
                );
            }

            return $item;
        });
    }
}
