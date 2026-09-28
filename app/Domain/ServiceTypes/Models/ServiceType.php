<?php

namespace App\Domain\ServiceTypes\Models;

use App\Domain\Businesses\Models\Business;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasUuids;

    const UPDATED_AT = null;

    protected $fillable = [
        'name',
    ];

    public function businesses()
    {
        return $this->belongsToMany(Business::class, 'business_service_types');
    }
}
