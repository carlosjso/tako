<?php

namespace App\Http\Api\Products\Controllers;

use App\Domain\Products\Models\Product;
use App\Http\Api\Controller;
use App\Http\Api\Products\Requests\StoreProductRequest;
use App\Http\Api\Products\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return Product::forCurrentBusiness()->get();
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product($request->validated());
        $product->business_id = Auth::user()->business_id;
        $product->save();

        return response()->json($product, 201);
    }

    public function show(string $id)
    {
        return Product::forCurrentBusiness()->findOrFail($id);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::forCurrentBusiness()->findOrFail($id);
        $product->update($request->validated());

        return $product;
    }

    public function destroy(string $id)
    {
        $product = Product::forCurrentBusiness()->findOrFail($id);
        $product->delete();

        return response()->noContent();
    }
}
