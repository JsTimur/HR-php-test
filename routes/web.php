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

Route::get('/', function() {
    return view('pages.index');
});
Route::get('/weather', 'WeatherController@index')->name('weather');
Route::get('/order/list/expired', 'OrderController@listExpired')->name('order.list.expired');
Route::get('/order/list/current', 'OrderController@listCurrent')->name('order.list.current');
Route::get('/order/list/new', 'OrderController@listNew')->name('order.list.new');
Route::get('/order/list/closed', 'OrderController@listClosed')->name('order.list.closed');
Route::get('/order/update/{order}', 'OrderController@update')->where('order', '[0-9]+')->name('order.update');
Route::post('/order/update', 'OrderController@updateAction')->name('order.update.action');
Route::get('/product/list', 'ProductController@index')->name('product.list');
Route::post('/product/update/price', 'ProductController@updatePrice');
