<?php

Route::get('/', function()
{
	header("Location: http://beta.jakobsteinn.com");
});

Route::get('/product/{slug}', [
	'uses'  => 'ProductsController@show',
	'as'    => 'products.show',
]);

Route::get('/product/{slug}/success', [
	'uses'  => 'ProductsController@success',
	'as'    => 'products.success',
]);

Route::get('/product/{slug}/pay', [
	'uses'  => 'ProductsController@pay',
	'as'    => 'products.pay'
]);


