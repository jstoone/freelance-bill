<?php namespace JakobSteinn\Users\Commands;

class UpdateCustomerCommand {

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $email;

	/**
	 * @var Customer
	 */
	public $customer;

	/**
	 * @param $customer
	 * @param $name
	 * @param $email
	 */
	function __construct($customer, $name, $email)
	{
		$this->customer = $customer;
		$this->name = $name;
		$this->email = $email;
	}

}
