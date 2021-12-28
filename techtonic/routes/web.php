<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Orders;
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

// HOME ROUTE

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


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

Route::get('/cart', [CartProductsController::class, 'show'])->name("cart");

Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');

Route::get('/products/{product}/reviews/create', [ReviewController::class, 'create'])
    ->name('reviews.create');

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store');


// CART AND CHECKOUT ROUTES

Route::put('/add-to-cart/{product}', [CartProductsController::class, 'update'])
    ->name('cart.update');

Route::get('/cart', [CartProductsController::class, 'show'])
    ->name('cart');

Route::post('/checkout', function(Request $req){
    return view('checkout',['products' => json_decode($req->data), "comment" => $req->comments ]);
})->name("checkout");


// ORDER ROUTES

Route::post('/final', [Orders::class, 'placeOrder'])->name("final");

Route::post('/order', [Orders::class, 'viewOrder'])->name('order');

Route::post('/change-quantity', [CartProductsController::class, 'changeQuantity'])->name("change");




// ACCOUNT ROUTES

Route::get('/account', [ProfileController::class, 'show'])->name('account');


//ADMIN ROUTES

Route::get('/admin/users', [UserController::class, 'adminIndex'])
    ->name('admin.users.index');

Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])
    ->name('admin.categories.index');

Route::get('/admin/categories/{category}', [CategoryController::class, 'adminShow'])
    ->name('admin.categories.show');

Route::get('/admin/orders', [Orders::class, 'adminIndex'])
    ->name('admin.orders.index');


