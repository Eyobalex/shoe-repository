<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
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
    return view('welcome');
});


Route::get('/add-to-cart/{id}', 'ShoeController@addToCart')->name('product.addToCart');
Route::get('/reduce/{id}', 'ShoeController@reduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'ShoeController@removeItem')->name('product.remove');
Route::get('/shoping-cart', 'ShoeController@getcart')->name('product.shoppingCart');
Route::get('/checkout', 'ShoeController@getCheckout')->name('checkout');

Route::resource('shoe', 'ShoeController');
//Route::get('/shoes', 'ShoeController@index')->name('shoes');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
