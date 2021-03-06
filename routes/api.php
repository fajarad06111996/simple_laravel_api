<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ProductController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/show-product', 'ProductController@showProduct');
Route::post('/create-product', 'ProductController@createProduct');
Route::get('/get-all-product', 'ProductController@getAllData');
Route::get('/search-product', 'ProductController@searchData');
Route::patch('/update-product/{id}', 'ProductController@updateData');
Route::delete('/delete-product/{id}', 'ProductController@deleteProduct');