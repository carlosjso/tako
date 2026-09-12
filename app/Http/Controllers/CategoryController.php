<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
        $category->business_id = auth()->user()->business_id;
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
