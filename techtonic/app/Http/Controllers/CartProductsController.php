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




    public function changeQuantity(Request $req){
        $user = User::find("fatima@abc.com");
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

        }

        
        
    }
}
