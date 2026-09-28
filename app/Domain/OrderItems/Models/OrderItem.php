<?php

namespace App\Domain\OrderItems\Models;

use App\Domain\InventoryMovements\Models\InventoryMovement;
use App\Domain\Orders\Models\Order;
use App\Domain\Products\Models\Product;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasUuids;

    protected $fillable = [
        'product_id',
        'quantity',
        'modifiers',
        'status',
        'cancel_reason',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
