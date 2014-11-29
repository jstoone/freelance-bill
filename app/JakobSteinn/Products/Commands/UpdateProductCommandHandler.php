<?php namespace JakobSteinn\Products\Commands;

use Laracasts\Commander\CommandHandler;

class UpdateProductCommandHandler implements CommandHandler {

	/**
	 * Handle the creation of a product
	 *
	 * @param UpdateProductCommand $command
	 * @return boolean
	 */
	public function handle($command)
	{
		$updateArray = [
			'name' => $command->name,
			'price' => $command->price,
			'description' => $command->description
		];

		if ($command->slug != $command->product->slug)
			$updateArray['slug'] = $command->slug;
		if (strlen($command->password))
			$updateArray['password'] = $command->password;

		return $command->product->update($updateArray);
	}
}
