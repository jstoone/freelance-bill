<?php namespace JakobSteinn\Sessions;

class SessionsCommand {

	/**
	 * @var string
	 */
	public $username;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @param $username
	 * @param $password
	 */
	function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}


}
