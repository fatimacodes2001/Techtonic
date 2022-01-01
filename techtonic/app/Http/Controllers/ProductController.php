<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\Response
     */
    public function adminCreate($categoryId)
    {   
        return view('admin.add-product', [
            'categoryId' => $categoryId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, Category $category
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request, Category $category)
    {
        ddd($request->all());
        ddd($request->file('pic_path'));
        // $attributes = $request->validate([
        //     'name' => 'required|string',
        //     'description' => 'required|string',
        //     'pic_path' => 'required|image',
        // ]);

        // $attributes['pic_path'] = $request->file('pic_path')->store('categories');
        // Product::create($attributes);
        // return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('color', 'specs', 'reviews')->find($id);
        $similarMerch = Product::where('category_id', $product->category_id)
                        ->where('id', '<>', $product->id)
                        ->limit(5)
                        ->get();
        $user = User::find("fatima@abc.com");
        $cart = Cart::where("customer_email",$user->email)->first();
        $cartItems = $cart->products;
        
        return view('product-desc', [
            'product' => $product,
            'similarMerch' => $similarMerch,
            'cartItems' => $cartItems
        ]);
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
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy(Category $category, Product $product)
    {
        $carts = Cart::get();
        foreach ($carts as $cart) {
            $cart->products()->detach($product->id);
        }
        $product->deleted = true;
        $product->save();
        return redirect()->route('admin.categories.show', $category->id);
    }
}
