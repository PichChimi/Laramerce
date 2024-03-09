<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;

class PageController extends Controller
{
    public function index()
    {
        $qtyadd = Cart::count(); 
        return view('pages.home',[
            'qtyadd' => $qtyadd
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function shop()
    {
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.shop',[
            'categories' => $categories
        ]);
    }

    // public function cart()
    // {
    //     return view('pages.cart');
    // }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
