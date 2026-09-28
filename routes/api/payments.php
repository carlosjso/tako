<?php

use App\Http\Api\Payments\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/orders/{orderId}/payments', [PaymentController::class, 'index'])->whereUuid('orderId');
Route::post('/orders/{orderId}/payments', [PaymentController::class, 'store'])->whereUuid('orderId');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->whereUuid('id');
