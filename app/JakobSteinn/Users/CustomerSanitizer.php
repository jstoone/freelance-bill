<?php namespace JakobSteinn\Users;

use Laracasts\Commander\CommandBus;

class CustomerSanitizer implements CommandBus {
	/**
	 * @var CustomerForm
	 */
	private $customerForm;

	/**
	 * @param CustomerForm $customerForm
	 */
	function __construct(CustomerForm $customerForm)
	{
		$this->customerForm = $customerForm;
	}

	/**
	 * Execute
	 *
	 * @param $command
	 * @return mixed
	 */
	public function execute($command)
	{

	}
}
