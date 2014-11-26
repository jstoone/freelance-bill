<?php namespace JakobSteinn\Billing;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Config;
use JakobSteinn\Products\Product;
use Stripe;

class StripeBilling implements BillingInterface {

	function __construct()
	{
		Stripe::setApiKey(Config::get('services.stripe.secret'));
	}

	public function charge(array $data)
	{
		if( ! $product = $data['product'])
			throw new InvalidArgumentException('No product found');

		try {
			return \Stripe_Charge::create([
				'amount' => $product->price,
				'currency' => 'DKK',
				'description' => $product->name,
				'card' => $data['token']
			]);
		} catch(\Stripe_CardError $e)
		{
			// card was declined
			dd('Card was declined');
		}
	}
}
