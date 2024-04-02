<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        $subtotal = 0.00;
        $total = 0.00;
        
        foreach($carts as $cart){
            $subtotal += $cart->total;
            $total += $cart->total;
        }
        
        return view('pages.carts.index', [
            'carts' => $carts,
            'subtotal' => $subtotal,
            'total' => $total,
            'qtyadd' => $qtyadd
        ]);
    }

    public function store(Product $product, Request $request)
    {
         Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id, 
            'qty' => 1,
            'total' => $product->Total(1)
         ]);

        //  return redirect(route('page.shop'));
        return redirect()->back();
    }

    public function destory(Cart $cart)
    {
        $cart->delete();
        return redirect(route('carts.index'));
    }

    public function updateQty(Cart $cart, Request $request)
    {
        $qtys = $request->get('Qty');
        $cart->qty = $qtys < 1 ? 1 : $qtys;
        $cart->total = $cart->product->Total($qtys);
        $cart->save();
        return redirect(route('carts.index'));
    }
}
