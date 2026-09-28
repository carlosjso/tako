<?php

use App\Http\Api\OrderItems\Controllers\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::get('/orders/{orderId}/items', [OrderItemController::class, 'index'])->whereUuid('orderId');
Route::post('/orders/{orderId}/items', [OrderItemController::class, 'store'])->whereUuid('orderId');
Route::get('/orders/{orderId}/items/{id}', [OrderItemController::class, 'show'])->whereUuid('orderId')->whereUuid('id');
Route::put('/orders/{orderId}/items/{id}', [OrderItemController::class, 'update'])->whereUuid('orderId')->whereUuid('id');
Route::put('/orders/{orderId}/items/{id}/cancel', [OrderItemController::class, 'cancelItemOrder'])->whereUuid('orderId')->whereUuid('id');
