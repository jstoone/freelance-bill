<?php namespace JakobSteinn\Billing\Customer;

interface CustomerInterface {

	/**
	 * Create a new custoemr
	 *
	 * @param array $data
	 * @return Stripe_Customer
	 */
	public function create(array $data);

	public function retrieve($id);
}
