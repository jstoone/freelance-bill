<?php

// Filters
Route::when('admin/*', 'auth');
Route::when('admin', 'auth');

// Route Model binding
use JakobSteinn\Products\Product;
Route::bind('product', function($value, $route)
{
	return Product::where('slug', $value)->firstOrFail();
});

Route::bind('customer', function($value, $route)
{
	return Customer::where('id', $value)->firstOrFail();
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
Route::get('login', [
	'uses'  => 'SessionsController@create',
	'as'    => 'sessions.create'
]);
Route::get('logout', [
	'uses'  => 'SessionsController@destroy',
	'as'    => 'sessions.destroy'
]);
Route::post('login', [
	'uses'  => 'SessionsController@store',
	'as'    => 'sessions.store'
]);

// Admin Product
Route::group(['prefix' => 'admin/product'], function () {
	Route::get('/', [
		'uses'  => 'AdminProductsController@index',
		'as'    => 'admin.products',
	]);
	Route::get('show/{product}', [
		'uses'  => 'AdminProductsController@show',
		'as'    => 'admin.products.show',
	]);
	Route::get('create', [
		'uses'  => 'AdminProductsController@create',
		'as'    => 'admin.products.create',
	]);
	Route::post('store', [
		'uses'  => 'AdminProductsController@store',
		'as'    => 'admin.products.store',
	]);
	Route::get('edit/{product}', [
		'uses'  => 'AdminProductsController@edit',
		'as'    => 'admin.products.edit',
	]);
	Route::post('update/{product}', [
		'uses'  => 'AdminProductsController@update',
		'as'    => 'admin.products.update',
	]);
	Route::get('destroy/{product}', [
		'uses'  => 'AdminProductsController@destroy',
		'as'    => 'admin.products.destroy',
	]);
});

// Admin Customer
Route::group(['prefix' => 'admin/customer'], function () {
	Route::get('/', [
		'uses'  => 'AdminCustomersController@index',
		'as'    => 'admin.customers',
	]);
	Route::get('show/{customer}', [
		'uses'  => 'AdminCustomersController@show',
		'as'    => 'admin.customers.show',
	]);
	Route::get('create', [
		'uses'  => 'AdminCustomersController@create',
		'as'    => 'admin.customers.create',
	]);
	Route::post('store', [
		'uses'  => 'AdminCustomersController@store',
		'as'    => 'admin.customers.store',
	]);
	Route::get('edit/{customer}', [
		'uses'  => 'AdminCustomersController@edit',
		'as'    => 'admin.customers.edit',
	]);
	Route::post('update/{customer}', [
		'uses'  => 'AdminCustomersController@update',
		'as'    => 'admin.customers.update',
	]);
	Route::get('destroy/{customer}', [
		'uses'  => 'AdminCustomersController@destroy',
		'as'    => 'admin.customers.destroy',
	]);
});

// Customer Product
Route::get('product/{slug}/auth', [
	'uses'  => 'ProductsController@auth',
	'as'    => 'products.auth',
]);

Route::post('product/verify/{slug}', [
	'uses'  => 'ProductsController@verify',
	'as'    => 'products.verify',
]);

Route::get('product/{slug}', [
	'uses'  => 'ProductsController@accept',
	'as'    => 'products.accept',
]);

Route::get('product/{slug}/success/', [
	'uses'  => 'ProductsController@success',
	'as'    => 'products.success',
]);

Route::get('product/pay/{slug}', [
	'uses'  => 'ProductsController@pay',
	'as'    => 'products.pay'
]);

Route::post('product/bill/{slug}', [
	'uses'  => 'ProductsController@bill',
	'as'    => 'products.bill'
]);
