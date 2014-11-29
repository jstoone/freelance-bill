<?php namespace JakobSteinn\Core\Billing;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Stripe;

class BillingServiceProvider extends ServiceProvider {

	/**
	 * On boot set stripe API key
	 */
	public function boot()
	{
		Stripe::setApiKey(Config::get('services.stripe.secret'));
	}

	/**
	 * Register correct Stripe implementations
	 */
	public function register()
	{
		$this->app->bind(
			'JakobSteinn\Core\Billing\BillingInterface',
			'JakobSteinn\Core\Billing\StripeBilling'
		);
		$this->app->bind(
			'JakobSteinn\Core\Billing\Customer\CustomerInterface',
			'JakobSteinn\Core\Billing\Customer\StripeCustomer'
		);
	}
}
