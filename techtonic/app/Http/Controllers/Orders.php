<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;

use Carbon\Carbon;



class Orders extends Controller
{
    

    public function placeOrder(Request $req){
        $order = new Order;
        if(empty($req->comment)){
            $order->remarks = "None";
        }else{
            $order->remarks = $req->comment;
        }

        $order->status = "Placed";
        $order->order_total = (int)$req->total;
        $order->payment_method = $req->mode;
        $order->customer_email = "fatima@abc.com";
        $order->date = Carbon::today();
        $order->address_id = 1;
        $order->save();

        foreach (json_decode($req->data) as $product) {

            $prod = Product::find($product->id);
            $order->products()->attach($prod, array('quantity' => (int) $product->pivot->quantity, "product_total" => (int) $product->pivot->quantity * (int) $product->price));

        }

    
        $address = Address::find($order->address_id);
        return view('order-final',['order' => $order, "address" => $address]);

    }

    public function viewOrder(Request $req){

        $order = Order::find((int)$req->id);
        $address = Address::find((int)$order->address_id);
        return view('order-final',['order' => $order, "address" => $address]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $orders = Order::with('address')->get();
        
        return view('admin.orders', [
            'orders' => $orders
        ]);
    }
}
