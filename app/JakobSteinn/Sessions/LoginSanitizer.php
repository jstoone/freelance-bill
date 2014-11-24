<?php namespace JakobSteinn\Sessions;

use Illuminate\Support\Facades\Input;
use Laracasts\Commander\CommandBus;

class LoginSanitizer implements CommandBus {

	/**
	 * @var LoginForm
	 */
	private $loginForm;

	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Execute login form sanitizer
	 *
	 * @param $command
	 * @return mixed
	 */
	public function execute($command)
	{
		$this->loginForm->validate(Input::all());
	}
}
