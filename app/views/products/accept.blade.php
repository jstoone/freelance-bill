@extends('layouts.master')

@section('content')
	<div id="products-accept" class="col-md-6 col-md-offset-3">
		<h1>Product details</h1>
		<hr/>

		<h2>{{ $product->name }} <small>{{ $product->present()->price }}</small></h2>

		<p>
			<b>Customer:</b>
			{{ $product->customer->name }}
		</p>
		<p>{{ $product->description }}</p>

		@if( ! $product->is_paid)
			<a class="btn btn-success" href="{{ URL::route('products.pay', $product->slug) }}">
				Correct, let me pay
			</a>
		@else
			<a class="btn btn-default disabled" href="{{ URL::route('products.pay', $product->slug) }}">
                This product has been paid for
            </a>
		@endif
	</div>
@stop
