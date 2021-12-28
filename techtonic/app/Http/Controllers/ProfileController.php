<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class ProfileController extends Controller
{
    //

    public function show(){

        $placed = Order::where("status", "=", "Placed")->get();
        $processing = Order::where("status", "=", "Processing")->get();
        $shipped = Order::where("status", "=", "Shipped")->get();
        $delivered = Order::where("status", "=", "Delivered")->get();
        return view("myaccount", ["placed" => $placed, "processing" => $processing, "shipped" => $shipped, "delivered" => $delivered]);

    }
}
