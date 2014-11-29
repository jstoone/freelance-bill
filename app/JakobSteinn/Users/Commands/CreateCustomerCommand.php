<?php namespace JakobSteinn\Users\Commands;

class CreateCustomerCommand {

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $email;

	/**
	 * @param $name
	 * @param $email
	 */
	function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

}
