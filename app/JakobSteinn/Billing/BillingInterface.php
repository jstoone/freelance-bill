<?php namespace JakobSteinn\Billing;

interface BillingInterface {

	/**
	 * Charge a Stripe customer card
	 *
	 * @param array $data
	 * @return Stripe_Charge
	 */
	public function charge(array $data);
}
