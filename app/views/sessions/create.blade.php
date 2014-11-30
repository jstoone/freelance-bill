@extends('layouts.master')

@section('content')
	<div id="sessions-create" class="">
		{{ Form::open(['route' => 'sessions.store', 'method' => 'post']) }}
			<h2>Please sign in</h2>

			<label class="sr-only" for="username">Username</label>
			{{ Form::text('username', null, [
				'class' => 'form-control',
				'placeholder' => 'Username'
				]) }}

				<label class="sr-only" for="password">Password</label>
				{{ Form::password('password', [
					'class' => 'form-control',
					'placeholder' => 'Password'
				]) }}

				{{ Form::submit('Submit', ['class' => 'btn btn-lg btn-primary btn-block']) }}

			{{ Form::close() }}
		</div>
	@stop
