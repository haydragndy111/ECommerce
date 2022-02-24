<?php

use Illuminate\Support\Facades\Route;


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
    return view('backend.layouts.app');
});

Route::group(
    ['prefix' => 'admin', 'middleware' => 'role:admin'],
    function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
        Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
        Route::resource('users_info', App\Http\Controllers\Admin\UserInfoController::class);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('orders', App\Http\Controllers\Admin\OrdersController::class);
        Route::resource('orderProdcuts', App\Http\Controllers\Admin\OrderProductController::class);
        Route::resource('settings', App\Http\Controllers\Admin\SettingsController::class);
    }
);

Route::group(
    // user and admin can get into this group of routes
    // ['middleware' => 'role:user,admin'],
    ['middleware' => 'role:user'],
    function () {
        Route::get('/', [App\Http\Controllers\User\ProductController::class, 'productList'])->name('products.list');
        Route::get('cart', [App\Http\Controllers\User\CartController::class, 'cartList'])->name('cart.list');
        Route::post('cart', [App\Http\Controllers\User\CartController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [App\Http\Controllers\User\CartController::class, 'updateCart'])->name('cart.update');
        Route::post('remove', [App\Http\Controllers\User\CartController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [App\Http\Controllers\User\CartController::class, 'clearAllCart'])->name('cart.clear');
        Route::post('stripe', [App\Http\Controllers\Admin\StripeController::class, 'stripePost'])->name('stripe.post');
        Route::get('stripe2', [App\Http\Controllers\Admin\StripeController::class, 'checkout'])->name('stripe.checkout');
        Route::resource('myorder', App\Http\Controllers\User\UserOrderController::class);
        Route::get('order_detail_user/{id}', [App\Http\Controllers\User\UserOrderController::class,'showDetail'])->name('myorder.showDetail');
        Route::resource('myprofile', App\Http\Controllers\User\UserProfileController::class);
    }
);
Route::group(['middleware' => 'role:admin'], function () {
    Route::post('UpdateStatus', [App\Http\Controllers\Api\ApiController::class, 'api_fun'])->name('api_fun');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');