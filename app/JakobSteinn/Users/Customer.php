<?php namespace JakobSteinn\Users;

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Support\Str;
use JakobSteinn\Products\Product;

class Customer extends \Eloquent {

	use SoftDeletingTrait;

	/**
	 * Specify which files are fillable, and protect against Mass Assignment
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'billing_id'];


	/**
	 * Define the relationship between a customer and it's products
	 *
	 * @return mixed
	 */
	public function products()
	{
		return $this->hasMany(Product::class, 'customer_id', 'id');
	}

	/**
	 * Make sure that names are formatted correctly
	 *
	 * @param $value string
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = Str::title($value);
	}


}
