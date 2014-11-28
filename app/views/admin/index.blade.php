@extends('...layouts.master')

@section('content')
	<div id="admin-index" class="col-md-12">
		<h1>Products <small>10 most recent</small></h1>
		<p>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.products.create') }}">New product</a>
			<a class="btn btn-sm btn-primary" href="{{ URL::route('admin.products') }}">All products</a>
		</p>

		@include('admin.products.partials.list', compact('products'))

		<h1>Customers <small>10 most recent</small></h1>
		<p>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.customers.create') }}">New Costumer</a>
			<a class="btn btn-sm btn-primary" href="{{ URL::route('admin.customers') }}">All Customers</a>
		</p>

		@include('admin.customers.partials.list', compact('customers'))

	</div>
@stop
