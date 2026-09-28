<?php

namespace App\Http\Api\InventoryMovements\Controllers;

use App\Domain\InventoryMovements\Actions\RecordInventoryMovementAction;
use App\Domain\InventoryMovements\Models\InventoryMovement;
use App\Http\Api\Controller;
use App\Http\Api\InventoryMovements\Requests\StoreInventoryMovementRequest;

class InventoryMovementController extends Controller
{
    public function index()
    {
        return InventoryMovement::forCurrentBusiness()->get();
    }

    public function store(StoreInventoryMovementRequest $request, RecordInventoryMovementAction $action)
    {
        $movement = $action->execute($request->validated()['product_id'], $request->validated());

        return response()->json($movement, 201);
    }

    public function show(string $id)
    {
        return InventoryMovement::forCurrentBusiness()->findOrFail($id);
    }
}
