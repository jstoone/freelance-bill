<?php

use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;

class AdminProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminproducts
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('admin.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminproducts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = Customer::lists('name', 'id');
		return View::make('admin.products.create', compact('customers'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminproducts
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminproducts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adminproducts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adminproducts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminproducts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
