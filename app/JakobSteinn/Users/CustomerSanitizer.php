<?php namespace JakobSteinn\Users;

use Laracasts\Commander\CommandBus;

class CustomerSanitizer implements CommandBus {
	/**
	 * @var CreateCustomerForm
	 */
	private $customerForm;

	/**
	 * @param CreateCustomerForm $customerForm
	 */
	function __construct(CreateCustomerForm $customerForm)
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
