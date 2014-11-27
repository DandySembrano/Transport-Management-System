@extends('layout.default')

@section('content')
			
			<form action="{{ URL::route('postCreateExpense') }}" method="POST" id="add_expense_form">

	        {{ Form::label('Description: ') }}  
	        {{ Form::text('description', Input::old('description'), ['class'=>'form-control', 'id'=>'description']) }}
	        	@if($errors->has('description'))
		        	<span style="color:red;">{{ $errors->first('description') }}</span>
		        @endif
		        
	        {{ Form::label('Memo: ') }}
	        {{ Form::textarea('memo', Input::old('memo'), ['class'=>'form-control', 'id'=>'memo', 'rows'=>4]) }}
	        	@if($errors->has('memo'))
		        	<span style="color:red;">{{ $errors->first('memo') }}</span>
		        @endif
				
				<?php //$cashInHand = 38000; ?>
				
				{{ Form::label('Cash In Hand: ') }} 
				{{ Form::text('cashInHand', number_format($cashInHand), ['class'=>'form-control', 'id'=>'cashInHand','readonly']) }}
	        	
		        
	        {{ Form::label('Amount: ') }}
	        {{ Form::text('amount', Input::old('amount'), ['class'=>'form-control', 'id'=>'amount']) }}
	        	@if($errors->has('amount'))
		        	<span style="color:red;">{{ $errors->first('amount') }}</span>
		        @endif

             {{ Form::label('Quantity: ') }}
          {{ Form::text('quantity', Input::old('quantity'), ['class'=>'form-control', 'id'=>'quantity']) }}
            @if($errors->has('quantity'))
              <span style="color:red;">{{ $errors->first('quantity') }}</span>
            @endif
			
			{{ Form::hidden('id', null, ['id'=>'id']) }}
			
			{{ Form::hidden('base_url', url(), ['id'=>'base_url']) }}
		
			{{ Form::token() }}

			<p>{{ Form::submit('Save') }}
			
            {{ Form::close(); }}
  
@stop