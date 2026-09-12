<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantTableRequest;
use App\Http\Requests\UpdateRestaurantTableRequest;
use App\Models\RestaurantTable;
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
        $table->business_id = auth()->user()->business_id;
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
