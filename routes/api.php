<?php

use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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
Auth::routes(['verify'=>false]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('products', 'ProductController',['except' => ['show']]);
Route::resource('options', 'OptionController',['except' => ['show']]);
Route::resource('choices', 'ChoiceController',['except' => ['show','index']]);
Route::post('orders',[
    'as'=>'orders.store',
    'uses'=>'OrderController@store',
    'middleware'=>'auth:sanctum'
]);
Route::post('orders/{order}',[
    'as'=>'orders.update',
    'uses'=>'OrderController@update',
    'middleware'=>'auth:sanctum'
]);
