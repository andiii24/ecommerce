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
});
