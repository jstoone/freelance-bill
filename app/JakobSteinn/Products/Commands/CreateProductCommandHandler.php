<?php namespace JakobSteinn\Products\Commands;

use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class CreateProductCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * Handle the creation of a product
	 *
	 * @param CreateProductCommand $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$product = Product::make(
			$command->customer_id,
			$command->name,
			$command->price,
			$command->description,
			$command->password,
			$command->slug
		);

		Customer::find($command->customer_id)
			->products()
			->save($product);

		return $product;
	}
}
