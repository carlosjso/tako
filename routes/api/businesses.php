<?php

use App\Http\Api\Businesses\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

Route::apiResource('businesses', BusinessController::class)->whereUuid('business');
Route::put('/business/service-types', [BusinessController::class, 'updateServiceTypes']);
