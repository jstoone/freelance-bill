<?php namespace JakobSteinn\Users\Commands;

use Laracasts\Commander\CommandHandler;

class UpdateCustomerCommandHandler implements CommandHandler {

	/**
	 * Handle updating an exisiting customer
	 *
	 * @param CreateCustomerCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		return $command->customer->update([
			'name' => $command->name,
			'email' => $command->email
		]);
	}
}
