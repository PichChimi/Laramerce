<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function productEdit(User $user, Product $product)
    {
       return $user->role == 'admin' || $user->id == $product->user_id;
    }

    public function productDelete(User $user, Product $product)
    {
       return $user->role == 'admin' || $user->id == $product->user_id;
    }

   
}
