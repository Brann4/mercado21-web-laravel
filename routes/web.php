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

Route::get('/', 'PageController@home')->name('pages.home');
Route::get('nosotros', 'PageController@aboutUs')->name('pages.about-us');
Route::get('carta-digital', 'PageController@menu')->name('pages.menu');
Route::get('contactanos', 'PageController@contactUs')->name('pages.contact-us');
Route::get('restaurantes', 'PageController@restaurants')->name('pages.restaurants');
Route::get('restaurante/{id}/{title}', 'PageController@restaurant')->name('pages.restaurant');
Route::get('producto/{id}/{title}', 'PageController@product')->name('pages.product');


Auth::routes();

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('pages.cart.index');
    Route::post('add', 'CartController@addToCart')->name('action.cart.add');
    Route::post('update', 'CartController@updateToCart')->name('action.cart.update');
    Route::post('remove', 'CartController@removeFromCart')->name('action.cart.remove');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('pages.checkout.index');
    Route::post('order/store', 'CheckoutController@orderStore')->name('action.checkout.order.store');
    Route::get('order/{order_id}/success', 'CheckoutController@orderSuccess')->name('action.checkout.order.success');
    //data person
    Route::get('denomination/dni/{document_number}', 'CheckoutController@denominationDNI')->name('action.checkout.denomination.dni');
    Route::get('denomination/ruc/{document_number}', 'CheckoutController@denominationRUC')->name('action.checkout.denomination.ruc');
});

Route::prefix('panel')->group(function () {
    Route::get('/', 'DashboardController@index')->name('pages.panel.index');
    Route::get('orders', 'DashboardController@orders')->name('pages.panel.orders');
    Route::get('orders/{id}', 'DashboardController@order')->name('pages.panel.order');
});



