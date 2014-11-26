<?php namespace JakobSteinn\Users;

use Laracasts\Commander\CommandHandler;

class UpdateCustomerCommandHandler implements CommandHandler {

	/**
	 * Handle the command
	 *
	 * @param CreateCustomerCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		return $command->customer->update([
			'name'  => $command->name,
			'email' => $command->email
		]);
	}
}
