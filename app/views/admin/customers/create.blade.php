@extends('layouts.master')

@section('content')
	<div id="admin-products-create" class="col-md-6 col-lg-offset-3">
		<h1>New customer</h1>

		{{ Form::open(['route' => 'admin.customer.store', 'method' => 'post']) }}

			{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
			{{ Form::text('name', null, [
				'class' => 'form-control',
				'id'    => 'name',
				'placeholder' => 'Name'
			]) }}

			{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
            {{ Form::text('email', null, [
                'class' => 'form-control',
                'id'    => 'email',
                'placeholder' => 'Email'
            ]) }}
            
            <label>
            	{{ Form::checkbox('save_billing', '1', null,  ['id' => 'save_billing']) }}
            	Save billing information?
            </label>

            {{ Form::submit('Create', ['class' => 'form-control btn btn-success']) }}
		{{ Form::close() }}
	</div>
@stop
