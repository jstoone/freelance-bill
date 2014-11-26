<?php

use JakobSteinn\Billing\BillingInterface;
use JakobSteinn\Products\Product;

class ProductsController extends BaseController {


	/**
	 * @var BillingInterface
	 */
	private $billing;

	function __construct(BillingInterface $billing)
	{
//		$this->beforeFilter('auth.mini', ['only' => 'pay']);
		$this->billing = $billing;
	}

	public function auth(Product $product) {

		return View::make('products.auth', compact('product', 'url'));
	}

	public function verify(Product $product)
	{
		if( ! Hash::check(Input::get('password'), $product->password))
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

	public function pay(Product $product)
	{
		if($product->is_paid)
		{
			Flash::message('This product has already been paid for.');
			return Redirect::route('products.accept', $product->slug);
		}

		return View::make('products.bill', compact('product'));
	}

	public function bill(Product $product) {
		$billing = $this->billing->charge([
			'token' => Input::get('stripe-token'),
			'product' => $product,
		]);

		if( ! $billing->paid )
		{
			Flash::error("Something went wrong, please try again.");
			return Redirect::back();
		}

		$product->is_paid = true;
		$product->save();

		return Redirect::route('products.success', $product->slug);
	}

	public function success(Product $product) {
		return View::make('products.success', compact('product'));
	}
}
