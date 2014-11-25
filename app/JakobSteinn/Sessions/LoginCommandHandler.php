<?php namespace JakobSteinn\Sessions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommandHandler;
use Laracasts\Flash\Flash;

class LoginCommandHandler implements CommandHandler
{

	/**
	 * Handle the login
	 *
	 * @param LoginCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		return Auth::attempt([
			'username' => $command->username,
			'password' => $command->password
		]);

	}
}
