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

//Route::get('/', function () {
    //return view('home');
//});

Route::get('/', 'HomeController@index');

Route::resource('products', 'ProductsController');

Route::get('category/{cat}', 'ProductsController@index');

Route::get('search','ProductsController@search');

Route::get('about', 'HomeController@about');

Route::get('product/{id}','ProductsController@product')->name('product.view');
Route::get('producten/beheren', 'ProductsController@manageProducts')->name('producten-beheren');
Route::get('producten/beheren/{id}', 'ProductsController@editProduct');

Route::get('categorieen/beheren', 'CategoriesController@manageCategories')->name('categorieen-beheren');
Route::get('catedit/{id}', 'CategoriesController@editCategory');
Route::get('catcreate', 'CategoriesController@createCat');
Route::post('createcat', 'CategoriesController@createCategory');
Route::patch('updateCat/{id}', 'CategoriesController@updateCat');

Route::get('subcatedit/{id}', 'CategoriesController@editSubCategory');
Route::get('subcatcreate', 'CategoriesController@createSubCat');
Route::get('subcatedit/{id}', 'CategoriesController@editSubCategory');
Route::post('createsubcat', 'CategoriesController@createSubCategory');
Route::patch('updateSubCat/{id}', 'CategoriesController@updateSubCat');


Route::get('winkelwagen', 'ShoppingCartController@index')->name('cart.products');
Route::get('add-to-cart/{id}', 'ShoppingCartController@store')->name('cart.add');
Route::get('remove/{id}', 'ShoppingCartController@RemoveItem')->name('product.remove');
Route::get('reduce/{id}', 'ShoppingCartController@ReduceByOne')->name('product.reduce');
Route::get('order/create/{redirectToPay}', 'OrderController@create')->name('order.create');
Route::get('pay/methods/{order_id}', 'PayController@methods')->name('pay.methods');
Route::get('pay/{order_id}', 'PayController@pay')->name('pay');
Route::get('mijn/orders', 'OrderController@index')->name('orders.my');
Route::get('bekijk/order/{order_id}', 'OrderController@view')->name('order.view');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
