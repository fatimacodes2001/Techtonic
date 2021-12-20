<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;




class CartProductsController extends Controller
{
    //

    public function show(){
        $user = User::find("fatima@abc.com");
        $cart = Cart::where("customer_email",$user->email)->first();
        $prods = $cart->products;
        return view('cart-items',['products' => $prods]);

    }
}
