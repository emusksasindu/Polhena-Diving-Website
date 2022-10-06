<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

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


// product related routes
Route::resource('/admin/products',ProductController::class );
Route::get('/admin/products/delete',[ProductController::class,'destroy'])->name('products.destroy');
Route::post('/admin/products/search',[ProductController::class,'search'])->name('products.adminsearch');


// service related routes
Route::resource('/admin/services',ServiceController::class );  
Route::get('/admin/services/delete',[ServiceController::class ,'destroy'])->name('services.destroy');
Route::post('/admin/services/search',[ServiceController::class ,'search'])->name('services.adminsearch');
});




// this route group use for users and guests only sections

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{
    //product related
    Route::get('/products',[ProductController::class, 'user_index'] )->name('products.index');
    Route::get('products/filter/{id?}/{min_price?}/{max_price?}/{size?}',[ProductController::class,'filter'])->name('products.filter');
    Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');
    Route::post('products',[ProductController::class,'search'])->name('products.search');
    

    //product related
    Route::get('/services',[ServiceController::class, 'user_index'] )->name('services.index');
    Route::get('services/filter/{id?}/{min_price?}/{max_price?}',[ServiceController::class,'filter'])->name('services.filter');
    Route::get('services/{service}',[ServiceController::class,'show'])->name('services.show');
    Route::post('services',[ServiceController::class,'search'])->name('services.search');

    Route::get('/blog', function () {
        return view('blogs.index');
    });
    
    Route::get('/checkout', function () {
        return view('checkout.index');
    });

    Route::get('/payment', function () {
        return view('payment.index');
    });
    
    Route::get('/about', function () {
        return view('about.index');
    });

});

// this route group use for users only
Route::group(['middleware' => 'App\Http\Middleware\AuthUserMiddleware'], function()
{
    //cart related
    Route::post('/cart/create',[CartController::class,'create'])->name('cart.create');
    Route::get('/cart/store/',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart/delete/{id}/{size}/{qty}/{discount}/{selling_price}/{type}',[CartController::class,'deleteItem'])->name('cart.deleteItem');
    Route::get('/cart',[CartController::class,'user_index'])->name('cart.user_index');


    // order related
    Route::get('/order/create',[OrderController::class,'create'])->name('orders.create');
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
    Route::get('/order/history',[OrderController::class,'user_index'])->name('orders.index');
    Route::get('/order/{order}',[OrderController::class,'show'])->name('orders.show');
    Route::post('/order/cancel',[OrderController::class,'cancelOrder'])->name('order.cancelOrder');


    //payment related
    Route::get('/payment/create/{id}',[PaymentController::class,'create'])->name('payment.create');
    Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');

    //user related
    Route::post('/user/updateInfo',[UserController::class,'updateInfo'])->name('user.updateInfo');
    Route::post('/user',[UserController::class,'updatePwd'])->name('user.updatePwd');

    //profile related
    Route::get('/profile', function () {
        return view('users.profile');
    });

    Route::get('/editpassword', function () {
        return view('users.editpassword');
    });

});

Route::get('/test/user/chat', function() {
    return view('users.chat_test');
});