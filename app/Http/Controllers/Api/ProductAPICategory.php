<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductAPICategory extends Controller
{
    public function index()
    {
       $products = Product::get();
       return response()->json(
            new Productcollection($products)
       );
    }

    public function store(Request $request)
    {
        $productData = $request->only(['category_id', 'user_id', 'name', 'description', 'qty_in_stock', 'unit_price']);
        $file = $request->file('image_url');
    
        // Check if file is present
        // if (!$file) {
        //     return response()->json([
        //         'message' => 'No image file uploaded!'
        //     ], 400);
        // }
    
        // Validate file
        // $request->validate([
        //     'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
    
        // Generate filename
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $nameAndPath = 'products/' . $filename . '.' . $extension;
    
        // Store file
        $file->storeAs('public/' . $nameAndPath);
    
        // Update product data with image URL
        $productData['image_url'] = 'storage/' . $nameAndPath;
    
        // Create product
        $product = Product::create($productData);
    
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ]);
    }
    
}
