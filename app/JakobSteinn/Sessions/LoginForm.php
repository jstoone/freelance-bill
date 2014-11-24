<?php namespace JakobSteinn\Sessions;

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
