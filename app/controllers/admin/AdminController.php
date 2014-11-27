<?php

use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;

class AdminController extends BaseController {

	/**
	 * Show administration panel
	 *
	 * @return mixed
	 */
	public function index() {
		$products = Product::limit(10)->orderBy('id', 'desc')->get();
		$customers = Customer::with('products')->limit(10)->orderBy('id', 'desc')->get();

		return View::make('admin.index', compact('products', 'customers'));
	}
}
