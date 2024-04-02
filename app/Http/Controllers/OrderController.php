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
        //    $cart->delete();
        }

        return redirect(route('orders.session'));
    }

    public function session()
    {
        $login = Auth::user();
        $carts = Cart::where('user_id', $login->id)->orderBy('created_at', 'desc')->get();
        $productItems = [];
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        foreach($carts as $cart){
            $productItems[] = [
                'price_data' => [ // Corrected array structure
                    'product_data' => [
                       'name' => $cart->product->name,
                    ],
                    'currency' => 'USD', // Corrected currency code
                    'unit_amount' => $cart->product->unit_price * 100, // Stripe expects the amount in cents
                ],
                'quantity'=> $cart->qty
            ];
            $cart->delete();
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            // 'payment_method_types' => ['card'],
            'line_items' => $productItems,
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'success_url' => route('page.paysuccess'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        return "Thanks for you order You have just complited your payment.The seeler will reach out to you as soon as posible.";
    }
    public function cancel()
    {
        return "Cancel";
    }
}
