<?php

namespace App\Domain\InventoryMovements\Models;

use App\Domain\Businesses\Models\Business;
use App\Domain\OrderItems\Models\OrderItem;
use App\Domain\Products\Models\Product;
use App\Domain\Users\Models\User;
use App\Domain\Concerns\BelongsToCurrentBusiness;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasUuids, BelongsToCurrentBusiness;

    protected $fillable = [
        'quantity_change',
        'reason',
        'note',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
