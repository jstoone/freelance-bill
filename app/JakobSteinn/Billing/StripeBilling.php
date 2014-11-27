<?php namespace JakobSteinn\Billing;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Config;
use JakobSteinn\Billing\Customer\CustomerInterface;
use Stripe;
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

	public function charge(array $data)
	{
		if ( ! $product = $data['product'])
			throw new InvalidArgumentException('No product found');

		$customerModel = $product->customer;

		if( ! $customerId = $customerModel->stripe_customer_id)
		{
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
