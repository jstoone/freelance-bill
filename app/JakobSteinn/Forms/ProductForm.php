<?php namespace JakobSteinn\Forms;

use Laracasts\Validation\FormValidator;

class ProductForm extends FormValidator {

	/**
	 * Validation rules for product
	 *
	 * @var array
	 */
	protected $rules = [
		'customer_id' => 'required|integer|exists:customers,id',
		'name' => 'required',
		'price' => 'required|integer',
		'description' => 'required',
	];
}
