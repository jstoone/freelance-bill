@extends('layouts.master')

@section('content')
	<div id="admin-customers-index" class="col-md-12">
		<h1>All customers</h1>
		<hr/>

		<p>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.products.create') }}">New product</a>
			<a class="btn btn-sm btn-success" href="{{ URL::route('admin.customers.create') }}">New Costumer</a>
			<a class="btn btn-sm btn-primary" href="{{ URL::route('admin') }}">Back</a>
		</p>
		@include('admin.customers.partials.list', compact('customers'));
	</div>
@stop
