<?php namespace JakobSteinn\Products;

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JakobSteinn\Users\Customer;
use Laracasts\Presenter\PresentableTrait;

class Product extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	/**
	 * Don't hide simple password
	 *
	 * @var array
	 */
	protected $hidden = [];

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
	protected $table = 'customer_products';

	/**
	 * Specify which files are fillable, and protect against Mass Assignment
	 *
	 * @var array
	 */
	protected $fillable = ['customer_id', 'name', 'price', 'description', 'password', 'is_paid', 'slug'];


	/**
	 * Define relationship between this product and it's owner
	 */
	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}


	/**
	 * Generate unique slug
	 *
	 * @param string $value
	 */
	public function setSlugAttribute($value)
	{
		$this->attributes['slug'] = $this->generateUniqueSlug($value);
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

	/**
	 * Query products that are paid
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopePaid($query)
	{
		return $query->where('is_paid', true);
	}

	/**
	 * Query products that are not paid
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeNotPaid($query)
	{
		return $query->where('is_paid', false);
	}

	/**
	 * Always hash passwords
	 *
	 * @param string $value
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	/**
	 * @param $name
	 * @param $price
	 * @param $customer_id
	 * @param $description
	 * @param $slug
	 * @param $password
	 * @return static
	 */
	public static function make($customer_id, $name, $price, $description, $password, $slug)
	{
		return new static(compact('customer_id', 'name', 'price', 'description', 'password', 'is_paid', 'slug'));
	}

	/**
	 * @param $value
	 * @return string
	 */
	private function generateUniqueSlug($value)
	{
		$slug = Str::slug($value);
		$slugs = static::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");

		if ($slugs->count() === 0)
			return $slug;

		// get reverse order and get first
		$lastSlugNumber = intval(str_replace($slug . '-', '', $slugs->orderBy('slug', 'desc')->first()->slug));
		return $slug . '-' . ($lastSlugNumber + 1);
	}
}
