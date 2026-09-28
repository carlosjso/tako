<?php

namespace App\Models;

use App\Models\Concerns\BelongsToCurrentBusiness;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasUuids, BelongsToCurrentBusiness;

    protected $fillable = [
        'method',
        'amount',
        'tip_amount',
    ];

    public function cashRegisterSession()
    {
        return $this->belongsTo(CashRegisterSession::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
