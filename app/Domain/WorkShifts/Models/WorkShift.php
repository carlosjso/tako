<?php

namespace App\Domain\WorkShifts\Models;

use App\Domain\Businesses\Models\Business;
use App\Domain\Orders\Models\Order;
use App\Domain\Users\Models\User;
use App\Domain\Concerns\BelongsToCurrentBusiness;
use App\Domain\Concerns\BelongsToCurrentUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    use HasUuids, BelongsToCurrentBusiness, BelongsToCurrentUser;

    protected $fillable = [
        'clock_in',
        'clock_out',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
