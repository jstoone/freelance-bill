<?php namespace JakobSteinn\Billing\Customer;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Stripe_Customer;

class StripeCustomer implements CustomerInterface {

	/**
	 * Create a new Stripe customer
	 *
	 * @param array $data
	 * @return Stripe_Customer
	 */
	public function create(array $data)
	{
		$this->guard($data);

		$model = $data['model'];

		return Stripe_Customer::create([
			'card' => $data['token'],
			'email' => $model->email,
			'description' => $model->name
		]);
	}

	/**
	 * Retrieve an existing Stripe customer
	 *
	 * @param $id
	 * @return Stripe_Customer
	 */
	public function retrieve($id)
	{
		if ( ! isset($id))
			throw new InvalidArgumentException('No id given');

		return Stripe_Customer::retrieve($id);
	}

	/**
	 * Guard and make sure we got the right initial data
	 *
	 * @param $data
	 */
	private function guard($data)
	{
		if ( ! isset($data['token']))
			throw new InvalidArgumentException('No token specified');

		if ( ! isset($data['model']))
			throw new InvalidArgumentException('No customer found');

	}
}
