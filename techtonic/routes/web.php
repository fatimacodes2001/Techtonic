<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\AuthController;
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

Route::get('/home', function () {
    return view('home');
});


Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/registerAddr', [AuthController::class, 'registerAddr'])->name('auth.registerAddr');
Route::post('auth/verify',[AuthController::class, 'verify'])->name('auth.verify');   
Route::post('auth/save',[AuthController::class, 'save'])->name('auth.save');   
Route::post('auth/check',[AuthController::class, 'check'])->name('auth.check');   

Route::get('/cart', [CartProductsController::class, 'show']);



Route::post('/checkout', function(Request $req){
    return view('checkout',['products' => json_decode($req->data)]);
    //return count(json_decode($req->data, true));



})->name("checkout");