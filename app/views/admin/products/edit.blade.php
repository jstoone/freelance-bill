@extends('layouts.master')

@section('content')
	<div id="admin-products-create" class="col-md-6 col-lg-offset-3">
		<h1>Create product</h1>

		@include('layouts.partials.form-errors')
		{{ Form::model($product, ['route' => ['admin.products.update', $product->slug], 'method' => 'post']) }}
			<div class="row">
	            <div class="col-md-12">
					{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
					{{ Form::text('name', null, [
						'class' => 'form-control',
						'id'    => 'name',
						'placeholder' => 'Name'
					]) }}
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
	                {{ Form::label('price', 'Price', ['class' => 'control-label']) }}
                    <div class="input-group">
                        <span class="input-group-addon">DKK</span>
                        {{ Form::text('price', $product->present()->priceRaw, [
                            'class' => 'form-control',
                            'id'    => 'price',
                            'placeholder' => 'Price'
                        ]) }}
                    </div>
                </div>
                
				<div class="col-md-8">
					{{ Form::label('customer', 'Customer', ['class' => 'control-label']) }}

					{{ Form::select('customer', $customers , $product->customer->id , [
						'class' => 'form-control',
						'id'    => 'customer',
						'name'  => 'customer_id'
					]) }}
				</div>
            </div>

            <div class="row">
	            <div class="col-md-12">
	                {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                    {{ Form::text('password', '', [
                        'class' => 'form-control',
                        'id'    => 'password',
                        'placeholder' => 'Fill in to change'
                    ]) }}

                    {{ Form::label('slug', 'Slug', ['class' => 'control-label']) }}
                    {{ Form::text('slug', null, [
                        'class' => 'form-control',
                        'id'    => 'slug',
                    ]) }}

                    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Product description">{{ $product->description }}</textarea>

	            </div>
            </div>

            <hr/>

            {{ Form::submit('Update', ['class' => 'form-control btn btn-success']) }}
		{{ Form::close() }}
	</div>
@stop
