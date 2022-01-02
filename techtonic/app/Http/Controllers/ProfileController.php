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

        $placed = Order::where(["status", "=", "Placed"], ["customer_email", "=", $mail])->get();
        $processing = Order::where(["status", "=", "Processing"], ["customer_email", "=", $mail])->get();
        $shipped = Order::where(["status", "=", "Shipped"], ["customer_email", "=", $mail])->get();
        $delivered = Order::where(["status", "=", "Delivered"], ["customer_email", "=", $mail])->get();
        
        return view("myaccount", ["placed" => $placed, "processing" => $processing, "shipped" => $shipped, "delivered" => $delivered]);

    }
}
