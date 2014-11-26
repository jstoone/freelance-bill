<?php namespace JakobSteinn\Products;

use JakobSteinn\Users\Customer;
use Laracasts\Commander\CommandHandler;

class CreateProductCommandHandler implements CommandHandler {

	/**
	 * Handle the creation of a product
	 *
	 * @param CreateProductCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$product = Product::make(
			$command->name,
			$command->price,
			$command->customer_id,
			$command->description
		);

		return Customer::find($command->customer_id)
				->products()
				->save($product);
	}
}
