<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        return ServiceType::all();
    }

    public function show(string $id)
    {
        return ServiceType::findOrFail($id);
    }
}
