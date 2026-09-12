<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuids;

    protected $fillable = [
        'status',
        'discount_percent',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function restaurantTable()
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }

    public function workShift()
    {
        return $this->belongsTo(WorkShift::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
