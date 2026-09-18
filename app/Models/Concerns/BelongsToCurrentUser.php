<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;

trait BelongsToCurrentUser
{
    public function scopeForCurrentUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
