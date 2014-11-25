<?php

// Route Model binding
use JakobSteinn\Products\Product;

Route::bind('slug', function($value, $route)
{
	return Product::where('slug', $value)->firstOrFail();
});

// Root redirect
Route::get('/', function()
{
	return Redirect::away('http://beta.jakobsteinn.com');
});

// Admin area
Route::get('admin', [
	'uses'  => 'AdminController@index',
    'as'    => 'admin.index'
]);

// Admin Sessions
Route::get('admin/login', [
	'uses'  => 'SessionsController@create',
	'as'    => 'sessions.create'
]);
Route::get('admin/logout', [
	'uses'  => 'SessionsController@destroy',
	'as'    => 'sessions.destroy'
]);
Route::post('admin/login', [
	'uses'  => 'SessionsController@store',
	'as'    => 'sessions.store'
]);

// Admin Product
Route::group(['prefix' => 'admin/product'], function () {
	Route::get('/', [
		'uses'  => 'AdminProductsController@index',
		'as'    => 'admin.products',
	]);
	Route::get('show/{slug}', [
		'uses'  => 'AdminProductsController@show',
		'as'    => 'admin.products.show',
	]);
	Route::get('create', [
		'uses'  => 'AdminProductsController@create',
		'as'    => 'admin.products.create',
	]);
	Route::get('edit/{slug}', [
		'uses'  => 'AdminProductsController@edit',
		'as'    => 'admin.products.edit',
	]);
	Route::get('destroy/{slug}', [
		'uses'  => 'AdminProductsController@destroy',
		'as'    => 'admin.products.destroy',
	]);
});

// Admin Customer
Route::resource('admin/customer', 'AdminCustomerController');

// Customer Product
Route::get('product/{slug}', [
	'uses'  => 'ProductsController@accept',
	'as'    => 'products.accept',
]);

Route::get('product/{slug}/login', [
	'uses'  => 'ProductsController@login',
	'as'    => 'products.login',
]);

Route::get('product/{slug}/success/', [
	'uses'  => 'ProductsController@success',
	'as'    => 'products.success',
]);

Route::get('product/pay/{slug}', [
	'uses'  => 'ProductsController@pay',
	'as'    => 'products.pay'
]);
