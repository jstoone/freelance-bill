@extends('layouts.master')

@section('content')
	<div id="sessions-create" class="">
		{{ Form::open(['route' => ['products.verify', $product->id], 'method' => 'post']) }}
			<h1>Enter password</h1>

			<label class="sr-only" for="password">Password</label>
			{{ Form::password('password', [
				'class' => 'form-control',
				'placeholder' => 'Password'
			]) }}

			{{ Form::submit('Submit', ['class' => 'btn btn-lg btn-primary btn-block']) }}

		{{ Form::close() }}
	</div>
@stop
