<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;

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


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/', [HomeController::class, 'index'])->name('index');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// this route group use for admin only sections
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{ 
    Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/services', function () {
    return view('admin.service');
});

Route::get('/orders', function () {
    return view('admin.orders');
});


Route::get('/inbox', function () {
    return view('admin.inbox');
});

Route::get('/posts', function () {
    return view('admin.posts');
});

Route::get('/users', function () {
    return view('admin.users');
});


Route::get('/finance', function () {
    return view('admin.finance');
});

Route::get('/chat', function () {
    return view('admin.chat');
});



Route::resource('/p',ProductController::class );

Route::resource('/s',ServiceController::class );
   
});


Route::get('/p',[ProductController::class, 'index'] )->name('products.index');

Route::get('/products', function () {
    return view('products.show');
});

Route::get('/services', function () {
    return view('services.show');
});

Route::get('/show', function () {
    return view('products.detail');
});

Route::get('/cart', function () {
    return view('cart.index');
});

Route::get('/blog', function () {
    return view('blogs.index');
});