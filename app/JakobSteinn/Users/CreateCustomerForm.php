<?php namespace JakobSteinn\Users;

use Laracasts\Validation\FormValidator;

class CreateCustomerForm extends FormValidator {

	/**
	 * Customer creation form validation rules
	 * @var array
	 */
	protected $rules = [
		'name' => 'required',
		'email' => 'required|email',
	];
}
