<?php

use App\Http\Api\Products\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class)->whereUuid('product');
