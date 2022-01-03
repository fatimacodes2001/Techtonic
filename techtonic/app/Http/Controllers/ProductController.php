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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
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
        $email = session("email");
        if(!isset($email)){
            return redirect('/auth/login');
        }

        $product = Product::with('color', 'specs', 'reviews')->find($id);
        $similarMerch = Product::where('category_id', $product->category_id)
                        ->where('deleted', false)
                        ->where('id', '<>', $product->id)
                        ->limit(5)
                        ->get();
        $user = User::find(session('email'));
        $cart = Cart::where("customer_email",$user->email)->first();
        $cartItems = $cart->products;
        
        $content = view('product-desc', [
            'product' => $product,
            'similarMerch' => $similarMerch,
            'cartItems' => $cartItems
        ]);
         return response($content)->header('Cache-Control', 'no-cache, must-revalidate');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoryId
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function adminEdit($categoryId, Product $product)
    {
        return view('admin.edit-product', [
            'categoryId' => $categoryId,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function adminUpdate(Request $request, Category $category, Product $product)
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
            'pic_path' => 'array|min:1|max:3',
            'pic_path.*' => 'image'
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

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->color_id = $productColor->id;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();

        $product->specs()->delete();
        foreach ($request->spec as $spec) {
            $productSpec = new ProductSpec([
                'spec' => $spec, 
            ]);
            $product->specs()->save($productSpec);
        }

        if(isset($request->pic_path)) {
            $product->images()->delete();
            foreach ($request->pic_path as $pic_path) {
                $productImage = new ProductImage([
                    'pic_path' => $pic_path->store('products'), 
                ]);
                $product->images()->save($productImage);
            }
        }

        return redirect()->route('admin.categories.show', $category->id);
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
