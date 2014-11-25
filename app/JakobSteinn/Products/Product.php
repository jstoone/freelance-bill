<?php namespace JakobSteinn\Products;

use Illuminate\Support\Str;
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

	private function generateUniqueSlug($value) {
		$slug = Str::slug($value);
        $slugs = static::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");
        if ($slugs->count() === 0)
                return $slug;

        // get reverse order and get first
        $lastSlugNumber = intval(str_replace($slug . '-', '', $slugs->orderBy('slug', 'desc')->first()->slug));
        return $slug . '-' . ($lastSlugNumber + 1);
	}
}
