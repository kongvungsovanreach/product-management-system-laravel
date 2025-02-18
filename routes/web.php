<?php

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
    $products = App\Product::paginate(12);
    return view('ajax.index', compact("products"));
});

Route::resource('products', 'user\ProductController');
Route::group(["prefix"=>"admin"], function(){
    Route::resource('products', 'admin\AdminProductController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
