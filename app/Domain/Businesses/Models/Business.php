<?php

namespace App\Domain\Businesses\Models;

use App\Domain\CashRegisterSessions\Models\CashRegisterSession;
use App\Domain\Categories\Models\Category;
use App\Domain\InventoryMovements\Models\InventoryMovement;
use App\Domain\Orders\Models\Order;
use App\Domain\Payments\Models\Payment;
use App\Domain\Products\Models\Product;
use App\Domain\RestaurantTables\Models\RestaurantTable;
use App\Domain\ServiceTypes\Models\ServiceType;
use App\Domain\Users\Models\User;
use App\Domain\WorkShifts\Models\WorkShift;
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

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
