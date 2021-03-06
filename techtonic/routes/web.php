<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
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

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/registerAddr', [AuthController::class, 'registerAddr'])->name('auth.registerAddr');
Route::post('auth/verify',[AuthController::class, 'verify'])->name('auth.verify');   
Route::post('auth/save',[AuthController::class, 'save'])->name('auth.save');   
Route::post('auth/check',[AuthController::class, 'check'])->name('auth.check');   
Route::post('auth/edit',[AuthController::class, 'edit'])->name('auth.edit');   


//Auth Routes


Route::post('/address', function (Request $req) {
    return view('address', ['comment' => $req->comment]);
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

Route::get('/products/{order}/{product}/reviews/create', [ReviewController::class, 'create'])
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
    ->name('admin')->middleware('admin');

// USER ROUTES

Route::get('/admin/users', [UserController::class, 'adminIndex'])
    ->name('admin.users.index')->middleware('admin');

Route::post('/admin/users/orders', [UserController::class, 'adminShow'])
    ->name('admin.users.show')->middleware('admin');


// CATEGORY ROUTES

Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])
    ->name('admin.categories.index')->middleware('admin');

Route::get('/admin/categories/create', [CategoryController::class, 'adminCreate'])
    ->name('admin.categories.create')->middleware('admin');

Route::post('/admin/categories', [CategoryController::class, 'adminStore'])
    ->name('admin.categories.store')->middleware('admin');

Route::get('/admin/categories/{category}', [CategoryController::class, 'adminShow'])
    ->name('admin.categories.show')->middleware('admin');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'adminEdit'])
    ->name('admin.categories.edit')->middleware('admin');

Route::put('/admin/categories/{category}', [CategoryController::class, 'adminUpdate'])
    ->name('admin.categories.update')->middleware('admin');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'adminDestroy'])
    ->name('admin.categories.destroy')->middleware('admin');

    
// PRODUCT ROUTES

Route::get('/admin/categories/{category}/products/create', [ProductController::class, 'adminCreate'])
    ->name('admin.products.create')->middleware('admin');

Route::post('/admin/categories/{category}/products', [ProductController::class, 'adminStore'])
    ->name('admin.products.store')->middleware('admin');

Route::get('/admin/categories/{category}/products/{product}/edit', [ProductController::class, 'adminEdit'])
    ->name('admin.products.edit')->middleware('admin');

Route::put('/admin/categories/{category}/products/{product}', [ProductController::class, 'adminUpdate'])
    ->name('admin.products.update')->middleware('admin');

Route::delete('/admin/categories/{category}/products/{product}', [ProductController::class, 'adminDestroy'])
    ->name('admin.products.destroy')->middleware('admin');


// ORDER ROUTES

Route::get('/admin/orders', [Orders::class, 'adminIndex'])
    ->name('admin.orders.index')->middleware('admin');

Route::get('/admin/orders/{order}', [Orders::class, 'adminShow'])
    ->name('admin.orders.show')->middleware('admin');

Route::post('/admin/orders/{order}', [Orders::class, 'adminUpdate'])
    ->name('admin.orders.update')->middleware('admin');


Route::any('/rollback', [Orders::class, 'changeAddr'])->name('rollback');

Route::any('/sign-out', function(){

    if(session('is_admin')) {
        session()->forget('is_admin');
    }
    session()->forget('email');
    return redirect("/");
}

)->name('sign-out');




// 