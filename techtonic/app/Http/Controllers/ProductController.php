<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpec;
use App\Models\ProductColor;
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
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'spec' => 'required|array',
            'spec.*' => 'required|string',
            'color' => 'required|array',
            'color.*' => 'required|string',
            'pic_path' => 'required|array|min:1|max:3',
            'pic_path.*' => 'required|image'
        ]);

        $color = ProductColor::where('name', $request->color['name'])
                ->where('hex', $request->color['hex'])
                ->first();

        if($color) {
            $productColor = $color;
        } else{
            $productColor = ProductColor::create([
                'name' => $request->color['name'],
                'hex' => $request->color['hex'],
            ]);
        }

        $product = new Product([
            'name' => $request->name, 
            'description' => $request->description,
            'price' => $request->price,
            'color_id' => $productColor->id,
            'stock_quantity' => $request->stock_quantity,
        ]);

        $category->products()->save($product);

        foreach ($request->spec as $spec) {
            $productSpec = new ProductSpec([
                'spec' => $spec, 
            ]);
            $product->specs()->save($productSpec);
        }

        foreach ($request->pic_path as $pic_path) {
            $productImage = new ProductImage([
                'pic_path' => $pic_path->store('products'), 
            ]);
            $product->images()->save($productImage);
        }

        return redirect()->route('admin.categories.show', $category->id);
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
