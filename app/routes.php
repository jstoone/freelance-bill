<?php

Route::get('/', function()
{
	return Redirect::away('http://beta.jakobsteinn.com');
});

// Product Admin
Route::resoruce('admin/product', 'AdminProductsController')

// Product Costumer
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

// Sessions
Route::resource('sessions', 'SessionsController', [
	'only' => ['create', 'store', 'destroy']
]);
