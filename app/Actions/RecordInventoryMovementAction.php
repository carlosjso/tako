<?php

namespace App\Actions;

use App\Exceptions\BusinessRuleException;
use App\Models\InventoryMovement;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordInventoryMovementAction
{
    public function execute(string $productId, array $data, ?string $orderItemId = null)
    {
        return DB::transaction(function () use ($productId, $data, $orderItemId) {
            $product = Product::forCurrentBusiness()->findOrFail($productId);

            if (! $product->track_inventory) {
                throw new BusinessRuleException('Este producto no tiene seguimiento de inventario.');
            }

            $movement = new InventoryMovement($data);
            $movement->business_id = $product->business_id;
            $movement->product_id = $product->id;
            $movement->user_id = Auth::user()->id;
            $movement->order_item_id = $orderItemId;
            $movement->save();

            $product->increment('current_stock', $data['quantity_change']);

            return $movement;
        });
    }
}
