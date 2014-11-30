<?php namespace JakobSteinn\Products\Events;

use JakobSteinn\Products\Product;

class ProductHasBeenAdded {

	/**
	 * @var Product
	 */
	private $product;

	function __construct(Product $product)
	{
		$this->product = $product;
	}
}
