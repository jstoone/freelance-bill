<?php namespace JakobSteinn\Products;

use JakobSteinn\Users\Customer;
use Laracasts\Commander\CommandHandler;

class UpdateProductCommandHandler implements CommandHandler {

	/**
	 * Handle the creation of a product
	 *
	 * @param UpdateProductCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$updateArray = [
			'name'      => $command->name,
			'price'     => $command->price,
			'description' => $command->description
		];

		if($command->slug != $command->product->slug)
			$updateArray['slug'] = $command->slug;
		if(count(trim($command->password)) == 0)
			$updateArray['password'] = $command->password;

		return $command->product->update($updateArray);
	}
}
