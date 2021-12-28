<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;




class CartProductsController extends Controller
{
    //

    public function show(){
        $user = User::find("fatima@abc.com");
        $cart = Cart::where("customer_email",$user->email)->first();
        $prods = $cart->products;
        
        return view('cart-items', ['products' => $prods]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $user = User::find("fatima@abc.com");
        $cart = Cart::where("customer_email",$user->email)->first();
        $prods = $cart->products;
        $prod = Product::find($productId);
        $cart->products()->attach($prod, array('quantity' => 1));

        return redirect('cart');
    }
}
