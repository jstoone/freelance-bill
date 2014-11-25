<?php namespace JakobSteinn\Users;

use Illuminate\Support\Str;

class Customer extends \Eloquent {

	/**
	 * Specify which files are fillable, and protect against Mass Assignment
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'billing_id'];

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = Str::title($value);
	}


}
