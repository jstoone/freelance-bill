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
	}

	/**
	 * Display a listing of the resource.
	 * GET /admincustomer
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admincustomer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admincustomer
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
		return Redirect::route('admin.index');
	}

	/**
	 * Display the specified resource.
	 * GET /admincustomer/{id}
	 *
	 * @param  Customer $customer
	 * @return Response
	 */
	public function show(Customer $customer)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admincustomer/{id}/edit
	 *
	 * @param  Customer $customer
	 * @return Response
	 */
	public function edit(Customer $customer)
	{
		return View::make('admin.customers.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admincustomer/{id}
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
	 * Remove the specified resource from storage.
	 * DELETE /admincustomer/{id}
	 *
	 * @param Customer $customer
	 * @return Response
	 */
	public function destroy(Customer $customer)
	{
		//
	}

}
