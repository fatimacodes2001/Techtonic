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
        $email = session("email");
        if(!isset($email)){
            return redirect('/auth/login');
        }

        $user = User::find(session("email"));
        $cart = Cart::where("customer_email",$user->email)->first();
        $prods = $cart->products;
        return view('cart-items', ['products' => $prods]);

    }




    public function changeQuantity(Request $req){
        $user = User::find(session("email"));
        $cart = Cart::where("customer_email", $user->email)->first();
        $product_id = (int) $req->id;
        $quantity = (int) $req->quantity;
        $stock = (int) $req->stock;

        $product = Product::find($product_id);
        $product->stock_quantity = $stock;
        $product->save();

        if($quantity == 0){
            $cart->products()->detach($product_id);
        }
        else{

            $cart->products()->updateExistingPivot($product_id, [
                'quantity' => $quantity
            ]);

        }}

        
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $user = User::find(session("email"));
        $cart = Cart::where("customer_email",$user->email)->first();
        $prods = $cart->products;
        $prod = Product::find($productId);
        $prod->stock_quantity = $prod->stock_quantity - 1;
        $prod->save();
        $cart->products()->attach($prod, array('quantity' => 1));

        return redirect('cart');
    }
}
