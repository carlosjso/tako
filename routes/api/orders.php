<?php

use App\Http\Api\Orders\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show'])->whereUuid('id');
Route::put('/orders/{id}', [OrderController::class, 'update'])->whereUuid('id');
Route::put('/orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->whereUuid('id');
