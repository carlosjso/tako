<?php

namespace App\Domain\Categories\Models;

use App\Domain\Businesses\Models\Business;
use App\Domain\Products\Models\Product;
use App\Domain\Concerns\BelongsToCurrentBusiness;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuids, SoftDeletes, BelongsToCurrentBusiness;

    protected $fillable = [
        'name',
        'display_order',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
