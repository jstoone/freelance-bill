<?php namespace JakobSteinn\Sessions;

class LoginCommand {

	/**
	 * @var string
	 */
	public $username;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @param string $username
	 * @param string $password
	 */
	function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}


}
