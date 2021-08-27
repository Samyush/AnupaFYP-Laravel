<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/tables', 'App\Http\Controllers\TableController@index');
Route::get('/tables/{id}', 'App\Http\Controllers\TableController@view');
Route::get('/food', 'App\Http\Controllers\FoodController@index');
Route::get('/food/{id}', 'App\Http\Controllers\FoodController@view');
Route::get('/categories', 'App\Http\Controllers\CategoriController@index');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoriController@view');
Route::get('/order/{id}', 'App\Http\Controllers\OrderController@view');
Route::get('/orders', 'App\Http\Controllers\OrderController@index');
Route::get('/blogs', 'App\Http\Controllers\API\BlogController@index');
Route::get('/bills/{id}', 'App\Http\Controllers\BillController@show');
Route::post('/orders', 'App\Http\Controllers\OrderFlutterController@store')->name('order.store');

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@login');

