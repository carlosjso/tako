<?php

use App\Http\Api\Categories\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)->whereUuid('category');
