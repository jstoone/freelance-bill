<?php

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
Route::resource('admin/product', 'AdminProductsController');

// Admin Customer
Route::resource('admin/customer', 'AdminCustomerController');

// Customer Product
Route::get('product/{slug}', [
	'uses'  => 'ProductsController@show',
	'as'    => 'products.show',
]);

Route::get('product/{slug}/success', [
	'uses'  => 'ProductsController@success',
	'as'    => 'products.success',
]);

Route::get('product/{slug}/pay', [
	'uses'  => 'ProductsController@pay',
	'as'    => 'products.pay'
]);
