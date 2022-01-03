<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;


use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $product = Product::find($productId)->only('id', 'name');
        $reviews = Review::where('product_id', $product['id'])->get();
        
        return view('reviews', [
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function create($orderId, $productId)
    {
        $email = session("email");
        if(!isset($email)){
            return redirect('/auth/login');
        }

        $order = Order::find($orderId);

        $product = Product::find($productId)->only('id', 'name');
        
        return view('add-review', [
            'product' => $product,
            'order' => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, int  $productId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $email = session("email");
        if(!isset($email)){
            return redirect('/auth/login');
        }

        $request->validate([
            'text' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $review = new Review([
            'text' => $request->text, 
            'rating' => $request->rating,
            'customer_email' => session('email'),
        ]);

        $product = Product::find($productId);
        $product->reviews()->save($review);

        $order = Order::find((int)$request->id);
        $address = Address::find((int)$order->address_id);
        return view('order-final',['order' => $order, "address" => $address]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
