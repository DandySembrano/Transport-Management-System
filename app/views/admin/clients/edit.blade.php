@extends('layout.default')

@section('content')
	      	{{Form::open(array('action' => 'ClientController@update', 'id'=>'edit_client_form'))}}

	        {{ Form::label('Client Name: ') }}  
	        {{ Form::text('clientName_edit', $data->clientName, ['class'=>'form-control', 'id'=>'clientName_edit']) }}
	        	@if($errors->has('clientName_edit'))
		        	<span style="color:red;">{{ $errors->first('clientName_edit') }}</span>
		        @endif
		        <br>
	        {{ Form::label('Phone Number: ') }}
	        {{ Form::text('phone_edit', $data->phone, ['class'=>'form-control', 'id'=>'phone_edit']) }}
	        	@if($errors->has('phone_edit'))
		        	<span style="color:red;">{{ $errors->first('phone_edit') }}</span>
		        @endif
		        <br>
	        {{ Form::label('Address: ') }}
	        {{ Form::text('address_edit', $data->address, ['class'=>'form-control', 'id'=>'address_edit']) }}
	        	@if($errors->has('address_edit'))
		        	<span style="color:red;">{{ $errors->first('address_edit') }}</span>
		        @endif

		        {{ Form::hidden('id_edit', $data->id, ['class'=>'form-control', 'id'=>'id_edit','readonly']) }}
		        <p>{{ Form::submit('Edit') }}
            {{ Form::close(); }}
 @stop
