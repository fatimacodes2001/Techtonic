<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartProductsController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('product-desc');
});



Route::get('/cart', [CartProductsController::class, 'show']);



Route::post('/checkout', function(Request $req){
    return view('checkout',['products' => json_decode($req->data)]);
    //return count(json_decode($req->data, true));



})->name("checkout");