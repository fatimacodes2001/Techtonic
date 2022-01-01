<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiscController;
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

Route::get('/', [MiscController::class, 'home'])
    ->name('home');



//Auth Routes
Route::get('/login', function () {
    return view('sign-in');
})->name('login');

Route::get('/signup', function () {
    return view('sign-up');
})->name('signup');

Route::get('/address', function () {
    return view('address');
})->name('address');



// ABOUT-US ROUTE

Route::get('/about-us', [MiscController::class, 'aboutUs'])
    ->name('about-us');




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


/*===================
    ADMIN ROUTES
====================*/

Route::get('/admin', [MiscController::class, 'admin'])
    ->name('admin');

// USER ROUTES

Route::get('/admin/users', [UserController::class, 'adminIndex'])
    ->name('admin.users.index');


// CATEGORY ROUTES

Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])
    ->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'adminCreate'])
    ->name('admin.categories.create');

Route::post('/admin/categories', [CategoryController::class, 'adminStore'])
    ->name('admin.categories.store');

Route::get('/admin/categories/{category}', [CategoryController::class, 'adminShow'])
    ->name('admin.categories.show');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'adminEdit'])
    ->name('admin.categories.edit');

Route::put('/admin/categories/{category}', [CategoryController::class, 'adminUpdate'])
    ->name('admin.categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'adminDestroy'])
    ->name('admin.categories.destroy');

    
// PRODUCT ROUTES

Route::get('/admin/categories/{category}/products/create', [ProductController::class, 'adminCreate'])
    ->name('admin.products.create');

Route::post('/admin/categories/{category}/products', [ProductController::class, 'adminStore'])
    ->name('admin.products.store');

Route::get('/admin/categories/{category}/products/{product}/edit', [ProductController::class, 'adminEdit'])
    ->name('admin.products.edit');

Route::put('/admin/categories/{category}/products/{product}', [ProductController::class, 'adminUpdate'])
    ->name('admin.products.update');

Route::delete('/admin/categories/{category}/products/{product}', [ProductController::class, 'adminDestroy'])
    ->name('admin.products.destroy');


// ORDER ROUTES

Route::get('/admin/orders', [Orders::class, 'adminIndex'])
    ->name('admin.orders.index');
