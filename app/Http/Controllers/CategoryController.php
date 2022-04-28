<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->slug = null;
        $category->update($request->all());

        return response()->json($category, 204);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json('Category deleted successfully', 204);
    }
}
