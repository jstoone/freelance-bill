<?php namespace JakobSteinn\Core\Billing;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Config;
use JakobSteinn\Billing\Customer\CustomerInterface;
use Stripe_Charge;

class StripeBilling implements BillingInterface {
	/**
	 * @var CustomerInterface
	 */
	protected $customerApi;

	/**
	 * @param CustomerInterface $customerApi
	 * @internal param CustomerInterface $customer
	 */
	function __construct(CustomerInterface $customerApi)
	{
		$this->customerApi = $customerApi;
	}

	/**
	 * Charge a Stripe customer card
	 *
	 * @param array $data
	 * @return Stripe_Charge
	 */
	public function charge(array $data)
	{
		if ( ! $product = $data['product'])
			throw new InvalidArgumentException('No product found');

		$customerModel = $product->customer;

		if ( ! $customerId = $customerModel->stripe_customer_id) {
			$customerId = $this->createCustomer($data['token'], $product);
		}

		return Stripe_Charge::create([
			'amount' => $product->price,
			'currency' => 'DKK',
			'description' => $product->name,
			'statement_description' => Config::get('services.stripe.invoice_text'),
			'receipt_email' => $product->customer->email,
			'customer' => $customerId,
		]);
	}

	/**
	 * Create a new Stripe customer
	 *
	 * @param $token
	 * @param $product
	 * @return mixed
	 */
	private function createCustomer($token, $product)
	{
		$customer = $this->customerApi->create([
			'token' => $token,
			'model' => $product->customer
		]);

		$product->customer->stripe_customer_id = $customer->id;

		return $customer->id;
	}
}
