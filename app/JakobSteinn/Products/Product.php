<?php namespace JakobSteinn\Products;

use JakobSteinn\Users\Customer;
use Laracasts\Presenter\PresentableTrait;

class Product extends \Eloquent {

	use PresentableTrait;

	/**
	 * Path to view presenter class
	 *
	 * @var string
	 */
	protected $presenter = ProductPresenter::class;

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
	 * Define relationship between this product and it's owner
	 */
	public function customer()
	{
		$this->belongsTo(Customer::class);
	}

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
