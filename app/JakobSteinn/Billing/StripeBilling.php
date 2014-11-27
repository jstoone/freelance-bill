<?php namespace JakobSteinn\Billing;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Config;
use Stripe;
use Stripe_Charge;

class StripeBilling implements BillingInterface {

	function __construct()
	{
		Stripe::setApiKey(Config::get('services.stripe.secret'));
	}

	public function charge(array $data)
	{
		if( ! $product = $data['product'])
			throw new InvalidArgumentException('No product found');

		return Stripe_Charge::create([
			'amount' => $product->price,
			'currency' => 'DKK',
			'description' => $product->name,
			'statement_description' => Config::get('services.stripe.invoice_text'),
			'receipt_email' => $product->customer->email,
			'card' => $data['token']
		]);
	}
}
