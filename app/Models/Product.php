<?php

namespace App\Models;

use App\Models\Concerns\BelongsToCurrentBusiness;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasUuids, SoftDeletes, BelongsToCurrentBusiness;

    protected $fillable = [
        'category_id',
        'name',
        'image_url',
        'sale_price',
        'production_cost',
        'current_stock',
        'is_available',
        'track_inventory',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
