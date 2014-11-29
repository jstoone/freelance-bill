<?php namespace JakobSteinn\Users\Commands;

use Laracasts\Commander\CommandHandler;

class CreateCustomerCommandHandler implements CommandHandler {

	/**
	 * Handle the creation of a new customer
	 *
	 * @param CreateCustomerCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{

		return Customer::create([
			'name' => $command->name,
			'email' => $command->email,
		]);
	}
}
