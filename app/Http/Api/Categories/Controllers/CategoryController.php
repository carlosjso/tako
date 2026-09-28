<?php

namespace App\Http\Api\Categories\Controllers;

use App\Domain\Categories\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Api\Categories\Requests\StoreCategoryRequest;
use App\Http\Api\Categories\Requests\UpdateCategoryRequest;
use App\Http\Api\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::forCurrentBusiness()->get();
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category($request->validated());
        $category->business_id = Auth::user()->business_id;
        $category->save();

        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        return Category::forCurrentBusiness()->findOrFail($id);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::forCurrentBusiness()->findOrFail($id);
        $category->update($request->validated());

        return $category;
    }

    public function destroy(string $id)
    {
        $category = Category::forCurrentBusiness()->findOrFail($id);
        $category->delete();

        return response()->noContent();
    }
}
