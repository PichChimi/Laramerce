<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class Stripecontroller extends Controller
{
    public function session(Cart $cart, Request $request)
    {
       dd($cart->title);
    }
}
