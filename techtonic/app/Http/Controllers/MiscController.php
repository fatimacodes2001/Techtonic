<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = Category::where('deleted', false)->has('products')->get();
        $sales = [];

        foreach($categories as $category){
            $products = $category->productIds();
            $productsSold = DB::table('order_has_products')->whereIn('product_id', $products)->sum('quantity');
            $sales[$category->id] = $productsSold;
        }

        arsort($sales);
        $sales =array_keys($sales);
        if(count($sales) > 4) {
            $sales=array_slice($sales, 0, 4, false);
        }
        
        $topTrends = Category::where('deleted', false)
                     ->whereIn('id', $sales)
                     ->limit(4)
                     ->get();
                           
        $topProducts = Product::withAvg('reviews as product_rating', 'rating')
                     ->where('deleted', false)
                     ->orderBy('product_rating', 'DESC')
                     ->limit(5)
                     ->get();
        
        return view('home', [
            'topTrends' => $topTrends,
            'topProducts' => $topProducts
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {   
        return view('about-us');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {   
        $count['users'] = User::where('is_admin', 0)->count();
        $count['categories'] = Category::where('deleted', false)->count();
        $count['products'] = Product::where('deleted', false)->count();
        $count['orders'] = Order::count();
        
        return view('admin.home', [
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
