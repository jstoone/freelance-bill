<?php

use JakobSteinn\Core\Mailers\CustomerMailer;
use JakobSteinn\Products\Product;

class EmailCustomerController extends BaseController {

	/**
	 * @var CustomerMailer
	 */
	private $customerMailer;

	function __construct(CustomerMailer $customerMailer)
	{
		$this->customerMailer = $customerMailer;
	}

	public function remind(Product $product)
	{
		$this->customerMailer->invoice($product);

		Flash::message('Sent user a invoice reminder');
		return Redirect::route('admin');
	}
}
