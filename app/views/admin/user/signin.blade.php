@extends('layout.default')

@section('content')

		<h3>Please sign in</h3>

		<form action="{{ URL::route('postsignin') }}" method="POST">
		<div class="form-group">
			<label for="username">Username: </label>
			{{ Form::text('username', Input::old('username'), ['placeholder'=>'Username', 'class'=>'form-control']) }}
		</div>
		@if($errors->has('username'))
			<small style="color:red">{{ $errors->first('username')	}}</small>
		@endif
		<div class="form-group">
			<label for="password">Password: </label>
			{{ Form::password('password', ['placeholder'=>'password', 'class'=>'form-control']) }}
		</div>
		@if($errors->has('password'))
			<small style="color:red">{{ $errors->first('password')	}}</small>
		@endif
		<div class="form-group">
			<label for="rememer"></label>
			{{ Form::checkbox('remember') }} Remember me
		</div>
		<br>
		<input type="submit" class="btn btn-primary" name="submit" value="Log In">
		{{ Form::token(); }}
		{{ Form::close(); }}
@stop