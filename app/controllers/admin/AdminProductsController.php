<?php

use JakobSteinn\Products\CreateProductCommand;
use JakobSteinn\Products\Product;
use JakobSteinn\Products\ProductForm;
use JakobSteinn\Products\ProductSanitizer;
use JakobSteinn\Products\UpdateProductCommand;
use JakobSteinn\Users\Customer;

class AdminProductsController extends \BaseController
{
	/**
	 * @var ProductForm
	 */
	private $productForm;

	function __construct(ProductForm $productForm)
	{
		$this->productForm = $productForm;
	}


	/**
	 * Display a listing of products.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('admin.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new product.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = Customer::lists('name', 'id');
		return View::make('admin.products.create', compact('customers'));
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->productForm->validate(Input::all());

		$input = Input::all();
		$input['slug'] = $input['name'];


		$product = $this->execute(CreateProductCommand::class, $input, [
			ProductSanitizer::class
		]);

		if ( ! $product)
		{
			Flash::error('Somthing went wrong, no product created.');
			return Redirect::back()->withInput();
		}

		Flash::success('Yay! Created new product: ' . $product->name);
		return Redirect::route('admin');
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param Product $product
	 * @return Response
	 */
	public function edit(Product $product)
	{
		$customers = Customer::orderBy('id', 'desc')->lists('name', 'id');
		return View::make('admin.products.edit', compact('product', 'customers'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param Product $product
	 * @return Response
	 */
	public function update(Product $product)
	{
		$this->productForm->validate(Input::all());

		$input = Input::all();
		$input['product'] = $product;


		$isUpdateOkay = $this->execute(UpdateProductCommand::class, $input, [
			ProductSanitizer::class
		]);

		if ( ! $isUpdateOkay)
		{
			Flash::error('Somthing went wrong, no product created.');
			return Redirect::back()->withInput();
		}

		Flash::success('Yay! Created new product: ' . $product->name);
		return Redirect::route('admin');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param Product $product
	 * @internal param int $product
	 * @return Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();

		Flash::success('Delete was successful.');
		return Redirect::back();
	}

}
