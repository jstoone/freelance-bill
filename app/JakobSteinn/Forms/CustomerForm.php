<?php namespace JakobSteinn\Forms;

use Laracasts\Validation\FormValidator;

class CustomerForm extends FormValidator {

	/**
	 * Customer creation form validation rules
	 * @var array
	 */
	protected $rules = [
		'name' => 'required',
		'email' => 'required|email|unique:customers',
	];
}
