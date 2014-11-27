<?php namespace JakobSteinn\Products;

class UpdateProductCommand {

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var integer
	 */
	public $price;

	/**
	 * @var integer
	 */
	public $customer_id;

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var string
	 */
	public $slug;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @var Product $product
	 */
	public $product;

	/**
	 * @param Product $product
	 * @param string  $name
	 * @param int     $price
	 * @param int     $customer_id
	 * @param string  $description
	 * @param string  $slug
	 * @param string  $password
	 */
	function __construct($product, $name, $price, $customer_id, $description, $slug, $password)
	{
		$this->product = $product;
		$this->name = $name;
		$this->price = $price;
		$this->customer_id = $customer_id;
		$this->description = $description;
		$this->slug = $slug;
		$this->password = $password;
	}
}
