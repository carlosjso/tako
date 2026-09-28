<?php

namespace App\Http\Api\Businesses\Controllers;

use App\Domain\Businesses\Models\Business;
use App\Http\Api\Businesses\Requests\StoreBusinessRequest;
use App\Http\Api\Businesses\Requests\StoreBusinessServiceTypeRequest;
use App\Http\Api\Businesses\Requests\UpdateBusinessRequest;
use App\Http\Api\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index()
    {
        return Business::all();
    }

    public function store(StoreBusinessRequest $request)
    {
        $business = Business::create($request->validated());

        return response()->json($business, 201);
    }

    public function show(string $id)
    {
        return Business::findOrFail($id);
    }

    public function update(UpdateBusinessRequest $request, string $id)
    {
        $business = Business::findOrFail($id);
        $business->update($request->validated());

        return $business;
    }

    public function destroy(string $id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return response()->noContent();
    }

    public function updateServiceTypes(StoreBusinessServiceTypeRequest $request)
    {
        $validated = $request->validated();

        $business = Auth::user()->business;
        $business->serviceTypes()->sync($validated['service_type_ids']);

        return $business->serviceTypes;
    }
}
