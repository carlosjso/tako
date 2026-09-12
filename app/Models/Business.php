<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'currency',
        'business_hours',
    ];

    protected $casts = [
        'business_hours' => 'array',
        'is_active' => 'boolean',
    ];

    public function serviceTypes()
    {
        return $this->belongsToMany(ServiceType::class, 'business_service_types');
    }

    public function restaurantTables()
    {
        return $this->hasMany(RestaurantTable::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function workShifts()
    {
        return $this->hasMany(WorkShift::class);
    }

    public function cashRegisterSessions()
    {
        return $this->hasMany(CashRegisterSession::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
