@extends('layout.default')

@section('content')

	      	{{Form::open(['url'=>URL::route('postCreatePayment'),'id'=>'add_payment_form'])}}

	        {{ Form::label('Client Name: ') }}  
	        {{ Form::select('client_id', [''=>'Select'] + Client::lists('clientName','id'), '', ['class'=>'form-control', 'id'=>'clientName']) }}
	        	@if($errors->has('client_id'))
		        	<span style="color:red;">{{ $errors->first('client_id') }}</span>
		        @endif
		        
	        {{ Form::label('Amount: ') }}
	        {{ Form::text('amount', Input::old('amount'), ['class'=>'form-control', 'id'=>'amount']) }}
	        	@if($errors->has('amount'))
		        	<span style="color:red;">{{ $errors->first('amount') }}</span>
		        @endif
		        
	        {{ Form::label('Mode: ') }}
	        {{ Form::select('mode', [''=>'Select','cash'=>'Cash','cheque'=>'Cheque'], '', ['class'=>'form-control', 'id'=>'address']) }}
	        	@if($errors->has('mode'))
		        	<span style="color:red;">{{ $errors->first('mode') }}</span>
		        @endif

             {{ Form::label('Cheque Name: ') }}
          {{ Form::text('chequeName', Input::old('chequeName'), ['class'=>'form-control', 'id'=>'chequeName']) }}
            @if($errors->has('chequeName'))
              <span style="color:red;">{{ $errors->first('chequeName') }}</span>
            @endif

             {{ Form::label('Cheque Number: ') }}
          {{ Form::text('chequeNumber', Input::old('chequeNumber'), ['class'=>'form-control', 'id'=>'chequeNumber']) }}
            @if($errors->has('chequeNumber'))
              <span style="color:red;">{{ $errors->first('chequeNumber') }}</span>
            @endif

            <p>{{ Form::submit('Save') }}
            {{ Form::close(); }}

@stop