<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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


Route::get('/orders', function () {
    return view('admin.orders');
});


Route::get('/inbox', function () {
    return view('admin.inbox');
});

Route::get('/posts', function () {
    return view('admin.posts');
});



Route::get('/finance', function () {
    return view('admin.finance');
});

Route::get('/chat', function () {
    return view('admin.chat');
});

Route::resource('admin/users',UserController::class );

Route::resource('admin/categories',CategoryController::class );

Route::resource('admin/products',ProductController::class );

Route::resource('admin/services',ServiceController::class );

   
});




// this route group use for users and guests only sections

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{
    //product related
    Route::get('/products',[ProductController::class, 'user_index'] )->name('products.index');
    Route::get('products/filter/{id?}/{min_price?}/{max_price?}/{size?}',[ProductController::class,'filter'])->name('products.filter');
    Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');
    Route::post('products',[ProductController::class,'search'])->name('products.search');
    Route::post('/cart/create',[CartController::class,'create'])->name('cart.create');
    Route::get('/cart',[CartController::class,'user_index'])->name('cart.user_index');
    Route::get('/services',[ProductController::class, 'user_index'] )->name('services.index');

    

    
    Route::get('/blog', function () {
        return view('blogs.index');
    });
    
    Route::get('/checkout', function () {
        return view('checkout.index');
    });
    
    Route::get('/about', function () {
        return view('about.index');
    });

});




