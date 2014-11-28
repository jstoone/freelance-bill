<?php

use JakobSteinn\Billing\BillingInterface;
use JakobSteinn\Products\Product;

class ProductsController extends BaseController {

	/**
	 * @var BillingInterface
	 */
	private $billing;

	/**
	 * @param BillingInterface $billing
	 */
	function __construct(BillingInterface $billing)
	{
		$this->billing = $billing;

		$this->beforeFilter('auth.mini', ['except' => ['auth', 'verify']]);
	}

	/**
	 * Show password prompt before giving access to product
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function auth(Product $product)
	{
		return View::make('products.auth', compact('product', 'url'));
	}

	/**
	 * Verify that the product password is correct
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function verify(Product $product)
	{
		// TODO: Extract to Command
		if( ! Hash::check(Input::get('password'), $product->password))
		{
			Flash::message('Wrong password, try again.');
			return Redirect::back()->withInput();
		}

		Session::put('verifier', $product->id);

		Flash::message('Please read the information below.');
		return Redirect::route('products.accept', $product->slug);
	}

	/**
	 * Show a brief description of what customer is paying for
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function accept(Product $product) {
		return View::make('products.accept', compact('product'));
	}

	/**
	 * Show payment form to customer
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function pay(Product $product)
	{
		if($product->is_paid)
		{
			Flash::message('This product has already been paid for.');
			return Redirect::route('products.accept', $product->slug);
		}

		return View::make('products.bill', compact('product'));
	}

	/**
	 * Charge the relevant customer for what the owe
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function bill(Product $product) {
		// TODO: Extract billing to Command
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

	/**
	 * Billing was successful
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function success(Product $product) {
		return View::make('products.success', compact('product'));
	}
}
