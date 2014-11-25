<?php

use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;

class AdminController extends BaseController {

	public function index() {
		$products = Product::limit(10)->orderBy('id', 'desc')->get();
		$customers = Customer::limit(10)->orderBy('id', 'desc')->get();

		return View::make('admin.index', compact('products', 'customers'));
	}
}
