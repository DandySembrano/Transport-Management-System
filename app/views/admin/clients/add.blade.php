@extends('layout.default')

@section('content')

	      	{{Form::open(['url'=>URL::route('postCreateClient'),'id'=>'add_client_form'])}}

	        {{ Form::label('Client Name: ') }}  
	        {{ Form::text('clientName', Input::old('clientName'), ['class'=>'form-control', 'id'=>'clientName']) }}
	        	@if($errors->has('clientName'))
		        	<span style="color:red;">{{ $errors->first('clientName') }}</span>
		        @endif
		       
	        {{ Form::label('Phone Number: ') }}
	        {{ Form::text('phone', Input::old('phone'), ['class'=>'form-control', 'id'=>'phone']) }}
	        	@if($errors->has('phone'))
		        	<span style="color:red;">{{ $errors->first('phone') }}</span>
		        @endif
		        
	        {{ Form::label('Address: ') }}
	        {{ Form::text('address', Input::old('address'), ['class'=>'form-control', 'id'=>'address']) }}
	        	@if($errors->has('address'))
		        	<span style="color:red;">{{ $errors->first('address') }}</span>
		        @endif

		        <p>{{ Form::submit('Save') }}
            {{ Form::close(); }}
@stop