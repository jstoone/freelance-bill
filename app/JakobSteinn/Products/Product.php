<?php namespace JakobSteinn\Products;

class Product extends \Eloquent {

	/**
	 * Specify which table to use
	 *
	 * @var string
	 */
	protected $table = 'costumer_products';

	/**
	 * Specify which files are fillable, and protect against Mass Assignment
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'price', 'description', 'password', 'is_paid'];


	/**
	 * Multiply to translate from "øre" to "kroner"
	 *
	 * @param int $value
	 */
	public function setPriceAttribute($value)
	{
		$this->attributes['price'] = $value * 100;
	}
}
