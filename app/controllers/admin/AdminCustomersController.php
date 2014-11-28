<?php

use Illuminate\Support\Facades\Input;
use JakobSteinn\Users\CreateCustomerCommand;
use JakobSteinn\Users\CustomerForm;
use JakobSteinn\Users\Customer;
use JakobSteinn\Users\CustomerSanitizer;
use JakobSteinn\Users\UpdateCustomerCommand;

class AdminCustomersController extends \BaseController
{

	/**
	 * @var CustomerForm
	 */
	private $customerForm;

	function __construct(CustomerForm $customerForm)
	{
		$this->customerForm = $customerForm;

		$this->beforeFilter('csrf', ['only' => ['store', 'update']]);
	}

	/**
	 * Display a listing of customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::all();

		return View::make('admin.customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new customer.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.customers.create');
	}

	/**
	 * Store a newly created customer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->customerForm->validate(Input::all());

		$customer = $this->execute(CreateCustomerCommand::class, null, [
			CustomerSanitizer::class
		]);

		if ( ! $customer) {
			Flash::error("Wooops. Something went wrong");
			return Redirect::back()->withInput();
		}

		Flash::success('YES! We successfully created customer: ' . $customer->name);
		return Redirect::route('admin');
	}

	/**
	 * Show the form for editing the specified customer.
	 *
	 * @param  Customer $customer
	 * @return Response
	 */
	public function edit(Customer $customer)
	{
		return View::make('admin.customers.edit', compact('customer'));
	}

	/**
	 * Update the specified customer in storage.
	 *
	 * @param  Customer $customer
	 * @return Response
	 */
	public function update(Customer $customer)
	{
		$input = Input::all();
		$input['customer'] = $customer;

		$this->customerForm->validate($input);

		$isUpdateOk = $this->execute(UpdateCustomerCommand::class, $input, [
			CustomerSanitizer::class
		]);

		if( ! $isUpdateOk)
		{
			Flash::error('Update failed, please try again.');
			return Redirect::back()->withInput();
		}

		Flash::success('Customer updated successfully!');
		return Redirect::route('admin');
	}

	/**
	 * Remove the specified customer from storage.
	 *
	 * @param Customer $customer
	 * @return Response
	 */
	public function destroy(Customer $customer)
	{
		$customer->delete();

		Flash::success('Customer successfully deleted.');
		return Redirect::back();
	}

}
