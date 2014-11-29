<?php namespace JakobSteinn\Forms;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator {

	/**
	 * Validation rules for login form
	 *
	 * @var array
	 */
	protected $rules = [
		'username' => 'required',
		'password' => 'required',
	];

}
