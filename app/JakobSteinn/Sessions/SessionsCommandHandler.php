<?php namespace JakobSteinn\Sessions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommandHandler;
use Laracasts\Flash\Flash;

class SessionsCommandHandler implements CommandHandler
{

	/**
	 * Handle the login
	 *
	 * @param SessionsCommand $command
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
