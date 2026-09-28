<?php

use App\Http\Api\CashRegisterSessions\Controllers\CashRegisterSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/cash-register-sessions', [CashRegisterSessionController::class, 'index']);
Route::post('/cash-register-sessions/open-sessions', [CashRegisterSessionController::class, 'openSession']);
Route::get('/cash-register-sessions/{id}', [CashRegisterSessionController::class, 'show'])->whereUuid('id');
Route::put('/cash-register-sessions/close-sessions/{id}', [CashRegisterSessionController::class, 'closeSession'])->whereUuid('id');
