<?php

namespace App\Domain\Orders\Models;

use App\Domain\Businesses\Models\Business;
use App\Domain\OrderItems\Models\OrderItem;
use App\Domain\Payments\Models\Payment;
use App\Domain\RestaurantTables\Models\RestaurantTable;
use App\Domain\WorkShifts\Models\WorkShift;
use App\Domain\Concerns\BelongsToCurrentBusiness;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuids, BelongsToCurrentBusiness;

    protected $fillable = [
        'table_id',
        'status',
        'discount_percent',
    ];

    protected static function booted()
    {
        static::creating(function (Order $order) {
            $todays_orders = static::where('business_id', $order->business_id)
                ->whereDate('created_at', Carbon::today())
                ->count();
            $next_number = $todays_orders + 1;
            $order->display_number = str_pad($next_number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function markAsPaid(): void
    {
        $this->orderItems()
            ->where('status', '!=', 'cancelled')
            ->update(['status' => 'paid', 'closed_at' => now()]);

        $this->status = 'paid';
        $this->closed_at = now();
        $this->save();
    }

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
