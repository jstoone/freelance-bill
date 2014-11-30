<?php namespace JakobSteinn\Core\Mailers;

use JakobSteinn\Products\Product;

class CustomerMailer extends Mailer {

	public function invoice(Product $product)
	{
		$customer = $product->customer;

		$view = 'emails.customers.invoice';
		$subject = "Your invoice for is ready";
		$data = [
			'customer' => $customer,
			'product' => $product,
			'link'      => $product->present()->link
		];

		return $this->sendTo($customer->email, $subject, $view, $data);
	}

}
