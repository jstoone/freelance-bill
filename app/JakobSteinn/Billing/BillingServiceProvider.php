<?php namespace JakobSteinn\Billing;

use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('JakobSteinn\Billing\BillingInterface', 'JakobSteinn\Billing\StripeBilling');
	}
}
