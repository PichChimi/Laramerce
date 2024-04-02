<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Advertisement;
use App\Models\NewInformation;
use App\Models\About;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->limit(3)->get();
        $advertisements = Advertisement::orderBy('created_at', 'desc')->limit(1)->get();
        $newinformations = NewInformation::orderBy('created_at', 'desc')->limit(3)->get();
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.home',[
            'qtyadd' => $qtyadd,
            'products' => $products,
            'advertisements' => $advertisements,
            'newinformations' => $newinformations
        ]);
    }

    public function about()
    {
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        $abouts = About::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.about',[
            'qtyadd' => $qtyadd,
            'abouts' => $abouts
        ]);
    }

    public function shop()
    {
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.shop',[
            'categories' => $categories,
            'qtyadd' => $qtyadd
        ]);
    }

    // public function cart()
    // {
    //     return view('pages.cart');
    // }

    public function checkout()
    {
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.checkout',[
            'qtyadd' => $qtyadd
        ]);
    }

    public function contact()
    {
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.contact',[
            'qtyadd' => $qtyadd
        ]);
    }

    public function newinformation(NewInformation $newinformation)
    {
        
        $categories = Category::get();
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.newinformation',[
            'qtyadd' => $qtyadd,
            'newinformation' => $newinformation,
            'categories' => $categories
        ]);
    }
    public function paysuccess()
    {
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.paySuccess',[
            'qtyadd' => $qtyadd
        ]);
    }
}
