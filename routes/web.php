<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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



Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// this route group use for admin only sections
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{ 
    Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/customer', function () {
    return view('admin.customer');
});

   
   
});
Route::resource('/products',ProductController::class );

//Route::get('/products',[ProductController::class, 'index'] )->name('products.index');