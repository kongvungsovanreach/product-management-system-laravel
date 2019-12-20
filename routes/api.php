<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"admin"], function(){
    Route::resource('products', 'admin\ApiAdminProductController');
    // Route::put('products/{id}', 'ApiAdminProductController@update');
});

Route::group(["prefix"=>"user"], function(){
    Route::resource('products', 'user\ApiUserProductController');
    // Route::put('products/{id}', 'ApiAdminProductController@update');
});
