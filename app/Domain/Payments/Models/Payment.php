<?php

namespace App\Domain\Payments\Models;

use App\Domain\CashRegisterSessions\Models\CashRegisterSession;
use App\Domain\Orders\Models\Order;
use App\Domain\Concerns\BelongsToCurrentBusiness;
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
