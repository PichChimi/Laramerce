<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $login = Auth::user();
        $carts = Cart::where('user_id', $login->id)->orderBy('created_at', 'desc')->get();
        $subtotal = 0.0;
        $total = 0.0;
        
        foreach($carts as $cart){
            $subtotal += $cart->total;
            $total += $cart->total;
        }

        $orderData = [
            'user_id' => $login->id,
            'sub_total' => $subtotal,
            'total' => $total,
            'shipping' => 'DUMMY DATA'
        ];

        $order = Order::create($orderData);

        // Order Detail

        foreach($carts as $cart){
           $orderDetain = [
            'order_id' => $order->id,
            'product_id' => $cart->product_id ,
            'qty'=> $cart->qty,
            'unit_price' => $cart->product->unit_price,
            'total' => $cart->product->Total($cart->qty)
           ];

           OrderDetail::create($orderDetain);
           $cart->delete();
        }

        dd('Redirect to Order History of user');
    }
}
