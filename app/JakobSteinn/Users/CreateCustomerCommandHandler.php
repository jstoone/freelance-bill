<?php namespace JakobSteinn\Users;

use Laracasts\Commander\CommandHandler;

class CreateCustomerCommandHandler implements CommandHandler {

	/**
	 * Handle the command
	 *
	 * @param CreateCustomerCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		return Customer::create([
				'name'  => $command->name,
				'email' => $command->email
		]);
	}
}
