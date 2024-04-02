<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ControllerAPICategory extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response()->json($categories);
    }

    public function home(Category $category)
    {
        $categories = Category::where('id', $category->id)->get();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $categories = Category::create($request->all());
        return response()->json($categories);
    }

    public function update(Category $category, Request $request)
    {
        $category->title = $request->get('title');
        $category->save();
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'Message' => 'Category is deleted!'
        ]);
    }

}
