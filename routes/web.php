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

Route::get('/', 'PageController@index')->name('pages.index');
Route::get('nosotros', 'PageController@aboutUs')->name('pages.about-us');
Route::get('contactanos', 'PageController@contactUs')->name('pages.contact-us');
Route::get('restaurantes', 'PageController@restaurants')->name('pages.restaurants');
Route::get('restaurante/{id}/{title}', 'PageController@restaurant')->name('pages.restaurant');
Route::get('carta-digital', 'PageController@digitalMenu')->name('pages.cart');


Auth::routes();

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('pages.cart.index');
    Route::post('add', 'CartController@addToCart')->name('action.cart.add');
    Route::post('update', 'CartController@updateToCart')->name('action.cart.update');
    Route::post('remove', 'CartController@removeFromCart')->name('action.cart.remove');
});



