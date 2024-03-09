<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category= Category::get();
        return view('backends.categories.index', [
        'categories' => $category
        ]);
    }

    public function create()
    {
        return view('backends.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
         return redirect(route('backends.categories.index'));
    }

    public function edit(Category $category)
    {
        return view('backends.categories.edit',[
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $category->title = $request->title;
        $category->save();
        return redirect(route('backends.categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('backends.categories.index'));
    }
}
