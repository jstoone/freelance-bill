<?php namespace JakobSteinn\Products;

class CreateProductCommand {

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
	 * @param $name
	 * @param $price
	 * @param $customer_id
	 * @param $description
	 */
	function __construct($name, $price, $customer_id, $description)
	{
		$this->name = $name;
		$this->price = $price;
		$this->customer_id = $customer_id;
		$this->description = $description;
	}
}
