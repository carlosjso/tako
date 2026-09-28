<?php

namespace App\Domain\RestaurantTables\Models;

use App\Domain\Businesses\Models\Business;
use App\Domain\Concerns\BelongsToCurrentBusiness;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantTable extends Model
{
    use HasUuids, SoftDeletes, BelongsToCurrentBusiness;

    protected $fillable = [
        'label',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'table_id');
    }
}
