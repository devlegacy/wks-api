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

Route::middleware('auth:api')->group(function () {
    Route::get('products', 'ProductsController@index')->name('products.index');

    Route::get('email/basic', 'MailController@basic')->name('email.basic');
});
// Route::resource('ProductsController');
// Route::get('welcome', function () {
//     return response()->json(['status' => 200, 'data' => 'Bienvenidos al Workshop de Laravel']);
// });
