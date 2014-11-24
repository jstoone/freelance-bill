<?php 

class ProductsController extends BaseController {

	public function show($slug) {

	}

	public function pay($slug) {
		$billing = App::make('JakobSteinn\Billing\BillingInterface');

		$billing->charge([
			'email' => Input::get('email'),
			'token' => Input::get('stripe-token')
		]);

		dd('Charge was successful!');
	}

	public function success($slug) {

	}
}
