<?php

// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'Frontend\FrontEndController@index');
Route::get('category', 'Frontend\FrontEndController@category');
Route::get('category-view/{slug}', 'Frontend\FrontEndController@view');
Route::get('product-view/{cat_slug}/{pro_slug}', 'Frontend\FrontEndController@prod_view');

Auth::routes();
Route::post('add-to-cart', 'Frontend\CartController@create');
Route::post('cart-item-delete', 'Frontend\CartController@destroy');
Route::post('wishlist-item-delete', 'Frontend\WishListController@destroy');
Route::post('update-cart', 'Frontend\CartController@update');
Route::post('add-to-wishlist', 'Frontend\WishListController@add');
Route::post('procced-to-pay', 'Frontend\CheckoutController@razorpaycheck');

Route::get('load-cart-data', 'Frontend\CartController@countCart');
Route::get('load-wish-data', 'Frontend\WishListController@countWish');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', 'Frontend\CartController@index');
    Route::get('checkout', 'Frontend\CheckoutController@index');
    Route::post('place-order', 'Frontend\CheckoutController@create');
    Route::get('my-orders', 'Frontend\UserController@index');
    Route::get('view-order/{id}', 'Frontend\UserController@view');
    Route::get('wishlist', 'Frontend\WishListController@index');

});
Route::get('/home', 'HomeController@index');
// Route::group(['middleware'=>['auth','isAdmin']],function (){
//     Route::get('/dashboard',function(){
//         return view('admin.dashboard');
//     });
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', 'Admin\FrontendController@index');
    //category
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@create');
    Route::post('insert-category', 'Admin\CategoryController@add');
    Route::get('edit-category/{id}', 'Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'Admin\CategoryController@update');
    Route::get('delete-category/{id}', 'Admin\CategoryController@destroy');
    //product
    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-products', 'Admin\ProductController@create');
    Route::post('insert-product', 'Admin\ProductController@store');
    Route::get('edit-product/{id}', 'Admin\ProductController@edit');
    Route::put('update-product/{id}', 'Admin\ProductController@update');
    Route::get('delete-product/{id}', 'Admin\ProductController@destroy');
    // User
    Route::get('users', 'Admin\DashboardController@index');
    Route::get('view-user/{id}', 'Admin\DashboardController@view');
    // Order
    Route::get('orders', 'Admin\OrderController@index');
    Route::get('admin/view-order/{id}', 'Admin\OrderController@view');
    Route::put('update-order/{id}', 'Admin\OrderController@update');
    Route::get('order-history', 'Admin\OrderController@history');
});
