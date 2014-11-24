<?php namespace JakobSteinn\Billing;

use Illuminate\Support\Facades\Config;
use Stripe;

class StripeBilling implements BillingInterface {

	function __construct()
	{
		Stripe::setApiKey(Config::get('services.stripe.secret'));
	}

	public function charge(array $data)
	{
		try {
			return \Stripe_Charge::create([
				'amount' => 1000,
				'currency' => 'DKK',
				'description' => $data['email'],
				'card' => $data['token']
			]);
		} catch(\Stripe_CardError $e)
		{
			// card was declined
			dd('Card was declined');
		}
	}
}
