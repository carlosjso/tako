<?php

namespace App\Models\Concerns;

trait BelongsToCurrentBusiness
{
    public function scopeForCurrentBusiness($query)
    {
        return $query->where('business_id', auth()->user()->business_id);
    }
}
