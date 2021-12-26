<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\ReviewController;
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
    return view('home');
})->name('home');


// ABOUT-US ROUTE

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');


// CATEGORY ROUTES

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('categories.show');


// PRODUCT ROUTES

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');


// REVIEW ROUTES

Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');

Route::get('/products/{product}/reviews/create', [ReviewController::class, 'create'])
    ->name('reviews.create');

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store');


// CART ROUTES

Route::get('/cart', [CartProductsController::class, 'show'])
    ->name('cart');

Route::post('/checkout', function(Request $req){
    return view('checkout',['products' => json_decode($req->data)]);
    //return count(json_decode($req->data, true));
})->name("checkout");