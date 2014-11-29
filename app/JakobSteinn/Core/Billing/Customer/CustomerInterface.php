<?php namespace JakobSteinn\Core\Billing\Customer;

interface CustomerInterface {

	/**
	 * Create a new Stripe customer
	 *
	 * @param array $data
	 * @return Stripe_Customer
	 */
	public function create(array $data);

	/**
	 * Retrieve an existing Stripe customer
	 *
	 * @param int $id
	 * @return Stripe_Customer
	 */
	public function retrieve($id);
}
