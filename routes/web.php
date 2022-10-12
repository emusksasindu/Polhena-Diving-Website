<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscribeController;
use App\Models\payment;
use App\Models\product;
use App\Models\service;

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
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/admin', [PaymentController::class, 'viewDashboard'])->name('admin.viewDashboard');

    Route::get('/admin/profile', function () {
        //chat
        $chats = (new ChatController)->chatMac();
        return view('admin.profile', compact('chats'));
    });

    ///////////////////////////////////////////////////////////
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('showorders.show');
    //////////////////////////////////////////////////////////////

    Route::match(['get', 'post'], '/finance', [ProductController::class, 'finance'])->name('finance');

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    Route::resource('admin/users', UserController::class);

    Route::resource('admin/categories', CategoryController::class);


    // product related routes
    Route::resource('/admin/products', ProductController::class);
    Route::get('/admin/products/delete', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/admin/products/search', [ProductController::class, 'search'])->name('products.adminsearch');


    // service related routes
    Route::resource('/admin/services', ServiceController::class);
    Route::get('/admin/services/delete', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('/admin/services/search', [ServiceController::class, 'search'])->name('services.adminsearch');


    // admin panel functions


    // admin inbox routes view messages------------------------------------
    Route::get('/inbox', [SubscribeController::class, 'show']);

    // admin inbox routes delete messages------------------------------------
    Route::get('/deletemessage/{id}', [SubscribeController::class, 'delete']);



    // admin view category table details routes-----------------------------------
    Route::get('/categories', [CategoryController::class, 'show']);

    // admin edit category details routes-----------------------------------
    Route::get('/editcategories/{id}', [CategoryController::class, 'editcategory']);

    Route::get('/editcategories', function () {
        return view('admin/editcategory');
    });
    // admin update category details routes----------------------
    Route::post('/categoryupdated', [CategoryController::class, 'update']);

    // admin delete category details routes---------------------
    Route::get('admin/deletecategory/{id}', [CategoryController::class, 'delete']);

    // admin create post----------------------------------------

    Route::post('/postcreated', [PostController::class, 'createpost']);

    Route::get('/addpost', function () {
        $chats = (new ChatController)->chatMac();
        return view('admin/addpost', compact('chats'));
    });

    // admin show all posts--------------------------------------
    Route::get('/posts', [PostController::class, 'showposts']);
    // admin delete post ----------------------------------------
    Route::get('/deletepost/{id}', [PostController::class, 'deletepost']);
    // editpost routes--------------------------------------------
    Route::get('/editpost/{id}', [PostController::class, 'editpost']);

    Route::get('/editpost', function () {
        return view('admin/editpost');
    });

    // update post -------------------------------------------------
    Route::post('/postupdated', [PostController::class, 'updatepost']);

    // view users--------------------------------------------------
    Route::get('/admin/users', [UserController::class, 'showusers']);

    // delete user ------------------------------------------------
    // Route::get('/admin/deleteuser/{id}',[UserController::class,'deleteuser']);
    // edit user ---------------------------------------------------
    Route::get('/admin/edituser/{id}', [UserController::class, 'edituser']);
    // user update-------------------------------------------------
    Route::post('/userupdated', [UserController::class, 'userupdate']);

    // show order details-------------------------------------------
    Route::get('/orders', [OrderController::class, 'showorders']);
    //order status update routes-----------------------------------
    Route::post('/statusupdated', [OrderController::class, 'statusupdate']);
    // admin details update----------------------------------------

    Route::post('/passwordchanged', [UserController::class, 'passwordchange'])->name('passwordchange');
    Route::post('/profileupdated', [UserController::class, 'profileupdate']);
});




// this route group use for users and guests only sections

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {
    //product related
    Route::get('/products', [ProductController::class, 'user_index'])->name('products.index');
    Route::get('products/filter/{id?}/{min_price?}/{max_price?}/{size?}', [ProductController::class, 'filter'])->name('products.filter');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('products', [ProductController::class, 'search'])->name('products.search');


    //service related
    Route::get('/services', [ServiceController::class, 'user_index'])->name('services.index');
    Route::get('services/filter/{id?}/{min_price?}/{max_price?}', [ServiceController::class, 'filter'])->name('services.filter');
    Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::post('services', [ServiceController::class, 'search'])->name('services.search');


    //post related
    Route::get('/post', [PostController::class, 'index'])->name('posts.index');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');


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


Route::group(['middleware' => 'App\Http\Middleware\AuthUserMiddleware'], function () {
    //cart related
    Route::post('/cart/create', [CartController::class, 'create'])->name('cart.create');
    Route::get('/cart/store/', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/delete/{id}/{size}/{qty}/{discount}/{selling_price}/{type}', [CartController::class, 'deleteItem'])->name('cart.deleteItem');
    Route::get('/cart', [CartController::class, 'user_index'])->name('cart.user_index');


    // order related
    Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/history', [OrderController::class, 'user_index'])->name('orders.index');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/order/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancelOrder');

    //payment related
    Route::get('/payment/create/{id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

    //user related
    Route::post('/user/updateInfo', [UserController::class, 'updateInfo'])->name('user.updateInfo');
    Route::post('/user', [UserController::class, 'updatePwd'])->name('user.updatePwd');


    //admin/profile related
    Route::get('/profile', function () {
        return view('users.profile');
    });

    Route::get('/editpassword', function () {
        return view('users.editpassword');
    });
});

// Route::get('/test/user/chat', function() {
//     return view('users.chat_test');
// });

Route::post('show/user/chat', [ChatController::class, 'user_chat']);
Route::post('show/admin/chat', [ChatController::class, 'admin_chat']);
Route::post('save/chat', [ChatController::class, 'store'])->name('chat.store');
Route::post('set/user/session', [ChatController::class, 'set_user_session'])->name('set_user_session');

Route::get('/testt', function () {
    $last_row = DB::table('chats')->latest("id")->first();
    if (!$last_row) {
        echo "Hello";
    } else {
        echo "Hello World";
    }
});

// subscribe function routes------------------------------(user side)
Route::post('/subscribed', [SubscribeController::class, 'index']);
