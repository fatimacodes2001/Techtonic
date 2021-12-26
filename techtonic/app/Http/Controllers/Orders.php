<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;



class Orders extends Controller
{
    //

    public function placeOrder(Request $req){
        $order = new Order;
        $order->remarks = $req->comment;
        $order->status = "Placed";
        $order->order_total = (int)$req->total;
        $order->payment_method = $req->mode;
        $order->customer_email = "fatima@abc.com";
        $order->date = Carbon::today();
        $order->address_id = 1;
        $order->save();

        return view('order-final',['data' => json_decode($req->data), "total" => $req->total, "remarks" => $req->comment, "mode" => $req->mode]);

    }
}
