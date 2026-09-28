<?php

namespace App\Http\Api\ServiceTypes\Controllers;

use App\Domain\ServiceTypes\Models\ServiceType;
use App\Http\Api\Controller;
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
