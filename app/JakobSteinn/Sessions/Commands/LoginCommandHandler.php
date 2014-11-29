<?php namespace JakobSteinn\Sessions\Commands;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;

class LoginCommandHandler implements CommandHandler {

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
