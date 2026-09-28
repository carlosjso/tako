<?php

namespace App\Http\Controllers;

use App\Http\Requests\CloseCashRegisterSessionRequest;
use App\Http\Requests\OpenCashRegisterSessionRequest;
use App\Models\CashRegisterSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashRegisterSessionController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'owner') {
            return CashRegisterSession::forCurrentBusiness()->get();
        }

        return CashRegisterSession::forCurrentBusiness()->forCurrentUser()->get();
    }

    public function openSession(OpenCashRegisterSessionRequest $request)
    {
        $existing = CashRegisterSession::forCurrentBusiness()
            ->forCurrentUser()
            ->whereNull('closed_at')
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Ya tienes una sesión abierta.'], 409);
        }

        $session = new CashRegisterSession($request->validated());
        $session->business_id = Auth::user()->business_id;
        $session->opened_by_user_id = Auth::user()->id;
        $session->opened_at = Carbon::now();
        $session->save();

        return response()->json($session, 201);
    }

    public function show(string $id)
    {
        return CashRegisterSession::forCurrentBusiness()->findOrFail($id);
    }

    public function closeSession(CloseCashRegisterSessionRequest $request, string $id)
    {
        $current_user = Auth::user();

        $session = CashRegisterSession::forCurrentBusiness()->findOrFail($id);

        if ($current_user->id !== $session->opened_by_user_id && $current_user->role != 'owner') {
            return response()->json(['message' => 'No puedes cerrar una sesión que no te pertenece.'], 403);
        }

        if ($session->closed_at) {
            return response()->json(['message' => 'Esta sesión ya está cerrada'], 409);
        }

        $session->fill($request->validated());

        $cash_payments = (int) $session->payments()
            ->where('method', 'cash')
            ->sum('amount');

        $session->expected_cash = $session->opening_cash + $cash_payments;
        $session->cash_difference = $session->closing_cash_counted - $session->expected_cash;

        $session->closed_at = Carbon::now();
        $session->closed_by_user_id = $current_user->id;
        $session->status = 'closed';
        $session->save();

        return $session;
    }
}
