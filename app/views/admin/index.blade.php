@extends('...layouts.master')

@section('content')
	<div id="product-auth" class="col-md-12">
		<h1>Products <small>10 most recent</small></h1>
		<p>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.products.create') }}">New product</a>
		</p>
		@include('admin.products.partials.list', compact('products'))

		<h1>Customers <small>10 most recent</small></h1>
		<p>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.customer.create') }}">New Costumer</a>
		</p>
		<div class="well">
			@include('admin.customers.partials.list', compact('customers'))
		</div>
	</div>
@stop
