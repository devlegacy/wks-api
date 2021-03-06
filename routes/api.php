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
    // Subir archivos laravel
    Route::post('local-store','ProductsController@localStorage')->name('local.storage');
    // Subir archivo amazon
    Route::post('amazon-store','ProductsController@amazonStorage')->name('amazon.storage');

    Route::get('email/basic', 'MailController@basic')->name('email.basic');
    Route::get('email/html', 'MailController@sendHTML')->name('email.html');
    Route::get('email/template', 'MailController@sendTemplate')->name('email.html');
});
// Route::resource('ProductsController');
// Route::get('welcome', function () {
//     return response()->json(['status' => 200, 'data' => 'Bienvenidos al Workshop de Laravel']);
// });
