<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Validation\Rule;
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

        if(isset($req->address)){

            $req->address = json_decode($req->address);
            $address = new Address;
            $address->street_address = $req->address->street_address;
            $address->country = $req->address->country;
            $address->city = $req->address->city;
            $address->postal_code = (int) $req->address->postal_code;
            $address->save();

        }
        

        $order->status = "Placed";
        $order->order_total = (int)$req->total;
        $order->payment_method = $req->mode;
        $order->customer_email = session("email");
        $order->date = Carbon::today();
        if(isset($address)){
            $order->address_id = $address->id;
        }else{
            $addr = User::find(session("email"))->address;
            $order->address_id = $addr->id;
        }
        $order->save();

        foreach (json_decode($req->data) as $product) {

            $prod = Product::find($product->id);
            $order->products()->attach($prod, array('quantity' => (int) $product->pivot->quantity, "product_total" => (int) $product->pivot->quantity * (int) $product->price));

        }


        $address = Address::find($order->address_id);
        $cart = Cart::where('customer_email', session("email"))->first();

        $cart->products()->detach();

        return view('order-final',['order' => $order, "address" => $address]);

    }

    public function viewOrder(Request $req){

        $order = Order::find((int)$req->id);
        $address = Address::find((int)$order->address_id);
        return view('order-final',['order' => $order, "address" => $address]);

    }

    public function changeAddr(Request $req){
        $cart = Cart::where('customer_email', session("email"))->first();
        $products = $cart->products;
        $address = new Address;
        $address->street_address = $req->street;
        $address->country = $req->country;
        $address->city = $req->city;
        $address->postal_code = (int) $req->postal;

        return view('checkout', ['products' => $products, "comment" => $req->comment, 'address' => $address]);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $orders = Order::with('address', 'products')
                        ->orderBy('date', 'DESC')
                        ->get();
        
        return view('admin.orders', [
            'orders' => $orders,
            'title' => "Orders"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        $order = Order::with('products')->find($id);
        
        return view('admin.order', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function adminUpdate(Request $request, Order $order)
    {
        $request->validate([
            'status' => [
                'required',
                Rule::in(['Placed', 'Processing', 'Shipped', 'Delivered']),
            ],
        ]);

        $order->status = $request->status;
        $order->save();
    }
}
