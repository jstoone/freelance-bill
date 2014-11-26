<?php

use Illuminate\Support\Facades\Input;
use JakobSteinn\Users\CreateCustomerCommand;
use JakobSteinn\Users\CreateCustomerForm;
use JakobSteinn\Users\CustomerSanitizer;

class AdminCustomersController extends \BaseController
{

	/**
	 * @var CreateCustomerForm
	 */
	private $customerForm;

	function __construct(CreateCustomerForm $customerForm)
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

		Flash::success('YES! We successfully created customer: '. $customer->name);
		return Redirect::route('admin.index');
	}

	/**
	 * Display the specified resource.
	 * GET /admincustomer/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admincustomer/{id}/edit
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admincustomer/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admincustomer/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
