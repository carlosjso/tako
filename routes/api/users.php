<?php

use App\Http\Api\Users\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', fn (Request $request) => $request->user());
Route::apiResource('users', UserController::class)->whereUuid('user');
