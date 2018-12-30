<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Controllers\Controller;
use IDEALE\Http\Requests\CategoryRequest;
use IDEALE\Http\Resources\CategoryResource;
use IDEALE\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        return CategoryResource::collection($categories);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([],204);
    }
}
