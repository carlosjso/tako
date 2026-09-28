<?php

namespace App\Http\Api\WorkShifts\Controllers;

use App\Domain\WorkShifts\Models\WorkShift;
use App\Http\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkShiftController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'owner') {
            return WorkShift::forCurrentBusiness()->get();
        }

        return WorkShift::forCurrentBusiness()->forCurrentUser()->get();
    }

    public function clockIn()
    {
        $existing = WorkShift::forCurrentBusiness()
            ->forCurrentUser()
            ->whereNull('clock_out')
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Ya tienes un turno abierto.'], 409);
        }

        $work_shift = new WorkShift();
        $work_shift->business_id = Auth::user()->business_id;
        $work_shift->user_id = Auth::user()->id;
        $work_shift->clock_in = now();
        $work_shift->save();

        return response()->json($work_shift, 201);
    }

    public function show(string $id)
    {
        if (Auth::user()->role == 'owner') {
            return WorkShift::forCurrentBusiness()->findOrFail($id);
        }

        return WorkShift::forCurrentBusiness()->forCurrentUser()->findOrFail($id);
    }

    public function clockOut(string $id)
    {
        $work_shift = WorkShift::forCurrentBusiness()->forCurrentUser()->findOrFail($id);
        $work_shift->clock_out = now();
        $work_shift->save();

        return $work_shift;
    }
}
