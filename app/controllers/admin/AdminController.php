<?php

use JakobSteinn\Products\Product;

class AdminController extends BaseController {

	public function index() {
		$products = Product::all();
		return View::make('admin.index', compact('products'));
	}
}
