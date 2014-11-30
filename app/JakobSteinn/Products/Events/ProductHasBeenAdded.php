<?php namespace JakobSteinn\Products\Events;

use JakobSteinn\Products\Product;

class ProductHasBeenAdded {

	/**
	 * @var Product
	 */
	public $product;

	function __construct(Product $product)
	{
		$this->product = $product;
	}
}
