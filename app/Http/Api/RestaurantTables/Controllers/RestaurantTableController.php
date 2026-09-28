<?php

namespace App\Http\Api\RestaurantTables\Controllers;

use App\Domain\RestaurantTables\Models\RestaurantTable;
use App\Http\Api\Controller;
use App\Http\Api\RestaurantTables\Requests\StoreRestaurantTableRequest;
use App\Http\Api\RestaurantTables\Requests\UpdateRestaurantTableRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RestaurantTableController extends Controller
{
    public function index()
    {
        return RestaurantTable::forCurrentBusiness()->get();
    }

    public function store(StoreRestaurantTableRequest $request)
    {
        $table = new RestaurantTable($request->validated());
        $table->business_id = Auth::user()->business_id;
        $table->save();

        return response()->json($table, 201);
    }

    public function show(string $id)
    {
        return RestaurantTable::forCurrentBusiness()->findOrFail($id);
    }

    public function update(UpdateRestaurantTableRequest $request, string $id)
    {
        $table = RestaurantTable::forCurrentBusiness()->findOrFail($id);
        $table->update($request->validated());

        return $table;
    }

    public function destroy(string $id)
    {
        $table = RestaurantTable::forCurrentBusiness()->findOrFail($id);
        $table->delete();

        return response()->noContent();
    }
}
