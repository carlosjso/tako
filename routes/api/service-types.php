<?php

use App\Http\Api\ServiceTypes\Controllers\ServiceTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/service-types', [ServiceTypeController::class, 'index']);
Route::get('/service-types/{id}', [ServiceTypeController::class, 'show'])->whereUuid('id');
