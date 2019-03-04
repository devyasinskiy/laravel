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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/**
 * Buyer
 */
Route::resource('buyers', 'Buyer\BuyerController', ['only'=>['index', 'show']]);

/**
 * Category
 */
Route::resource('categories', 'Category\CategoryController', ['exept'=>['create', 'edit']]);

/**
 * Product
 */
Route::resource('products', 'Product\ProductController', ['only'=>['index', 'show']]);

/**
 * Seller
 */
Route::resource('sellers', 'Seller\SellerController', ['only'=>['index', 'show']]);

/**
 * Transaction
 */
Route::resource('transactions', 'Transaction\TransactionController', ['only'=>['index', 'show']]);

/**
 * User
 */

//Route::get('users', 'UserController@index');
//
//Route::get('users', function ($name) {
//    //
//})->where('name', '[A-Za-z]+');
//
Route::resource('/users', 'User\UserController', ['exept'=>['create', 'edit']]);

