<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class ProfileController extends Controller
{
    //

    public function show(){
        $mail = session("email");
        if(!isset($mail)){
            return redirect('/auth/login');
        }

        $placed = Order::where("status", "=", "Placed")->where("customer_email", "=", session("email"))->get();
        $processing = Order::where("status", "=", "Processing")->where("customer_email", "=", session("email"))->get();
        $shipped = Order::where("status", "=", "Shipped")->where("customer_email", "=", session("email"))->get();
        $delivered = Order::where("status", "=", "Delivered")->where("customer_email", "=", session("email"))->get();
        return view("myaccount", ["placed" => $placed, "mail" => $mail, "processing" => $processing, "shipped" => $shipped, "delivered" => $delivered]);

    }
}
