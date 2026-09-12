<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;

trait BelongsToCurrentBusiness
{
    public function scopeForCurrentBusiness($query)
    {
        return $query->where('business_id', Auth::user()->business_id);
    }
}
