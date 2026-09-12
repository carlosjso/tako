<?php

namespace App\Models;

use App\Models\Concerns\BelongsToCurrentBusiness;
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
