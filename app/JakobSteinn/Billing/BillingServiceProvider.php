<?php namespace JakobSteinn\Billing;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use JakobSteinn\Billing\Customer\CustomerInterface;
use JakobSteinn\Billing\Customer\StripeCustomer;
use Stripe;

class BillingServiceProvider extends ServiceProvider {

	public function boot()
	{
		Stripe::setApiKey(Config::get('services.stripe.secret'));
	}

	public function register()
	{
		$this->app->bind(BillingInterface::class, StripeBilling::class);
		$this->app->bind(CustomerInterface::class, StripeCustomer::class);
	}
}
