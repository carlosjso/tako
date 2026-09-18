<?php

namespace App\Models;

use App\Models\Concerns\BelongsToCurrentBusiness;
use App\Models\Concerns\BelongsToCurrentUser;
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
