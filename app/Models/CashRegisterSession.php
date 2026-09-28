<?php

namespace App\Models;

use App\Models\Concerns\BelongsToCurrentBusiness;
use App\Models\Concerns\BelongsToCurrentUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CashRegisterSession extends Model
{
    use HasUuids, BelongsToCurrentBusiness, BelongsToCurrentUser;

    protected $fillable = [
        'opening_cash',
        'closing_cash_counted',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function openedBy()
    {
        return $this->belongsTo(User::class, 'opened_by_user_id');
    }

    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by_user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
