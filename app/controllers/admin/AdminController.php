<?php

use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;

class AdminController extends BaseController {

	public function index() {
		$products = Product::limit(10)->get();
		$customers = Customer::limit(10)->get();
		return View::make('admin.index', compact('products', 'customers'));
	}
}
