@extends('layout.default')

@section('content')

		<h1>Register</h1>
		<form action="{{ URL::route('postRegister') }}" method="POST">
		<div class="form-group{{($errors->has('username')) ? ' has-error': ' ' }}">
			<label for="username">Username: </label>
			{{ Form::text('username', Input::old('username'), ['class'=>'form-control'] ) }}
		</div>
		@if($errors->has('username'))
			{{ $errors->first('username')	}}
		@endif
		<div class="form-group{{($errors->has('password1')) ? ' has-error': ' ' }}">
			<label for="password">Password: </label>
			<input type="password" name="password1" class="form-control">
		</div>
		@if($errors->has('password1'))
			{{ $errors->first('password1')	}}
		@endif
		<div class="form-group{{($errors->has('password2')) ? ' has-error': ' ' }}">
			<label for="password">Confirm Password: </label>
			<input type="password" name="password2" class="form-control">
		</div>
		@if($errors->has('password2'))
			{{ $errors->first('password2')	}}
		@endif
		<br>
		<input type="submit" class="btn btn-primary" name="submit" value="Submit">

		{{ Form::token(); }}
		{{ Form::close(); }}

@stop