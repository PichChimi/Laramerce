<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backends.products.index ',[
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('backends.products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $product = $request->all();
        $file = $request->file('image_url');
        if(!$file){
            return back();
        }

        $filename = time() . '_' .$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $nameandPath = 'products/' . $filename . '.' . $extension;
        $file->storeAs('public/' . $nameandPath);
        $product['image_url'] = 'storage/' . $nameandPath;
        Product::create($product);

        return redirect(route('backends.products.index'));
    }

    public function edit(Product $product, Request $request)
    {
        if($request->user()->cannot('productEdit', $product)){
             return back();
        }

        $categories = Category::pluck('title','id');
        return view('backends.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        return view('backends.products.show',[
            'product' => $product
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $productData = $request->all();
        $file = $request->file('image_url');
        if($file){
            $filename = time() . '_' .$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $nameandPath = 'products/' . $filename . '.' . $extension;
            $file->storeAs('public/' . $nameandPath);
            $productData['image_url'] = 'storage/' . $nameandPath;
            File::delete($product->image_url);
        }
        $product->update($productData);
        return redirect(route('backends.products.index'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('productDelete', $product);
        $imageUrl = $product->image_url;
        $product->delete();
        File::delete($imageUrl);
        return redirect(route('backends.products.index'));
    }
}
