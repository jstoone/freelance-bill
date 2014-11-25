<?php

use JakobSteinn\Products\Product;

class ProductsController extends BaseController {


	function __construct()
	{
		$this->beforeFilter('auth.mini', ['only' => 'pay']);
	}

	public function login(Product $product) {
		return View::make('products.login', $product->slug);
	}

	public function verify(Product $product)
	{
		if( ! Input::get('verifier') == $product->passwordSnippet())
		{
			Flash::message('Wrong password, try again.');
			return Redirect::back()->withInput();
		}

		Session::put('verified', true);

		Flash::message('Please read the information below.');
		return Redirect::route('products.accept', $product->slug);
	}

	public function accept(Product $product) {
		return View::make('products.accept', compact('product'));
	}

	public function pay(Product $product) {
		$billing = App::make('JakobSteinn\Billing\BillingInterface');

		$billing->charge([
			'email' => Input::get('email'),
			'token' => Input::get('stripe-token')
		]);

		return Redirect::route('products.success');
	}

	public function success(Product $product) {
		dd('Charge was successful!');
	}
}
