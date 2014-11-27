@extends('layout.default')

@section('content')
			
			<form action="{{ URL::route('postCreateExpense') }}" method="POST" id="add_expense_form">

	        {{ Form::label('Description: ') }}  
	        {{ Form::text('description', $data->description, ['class'=>'form-control', 'id'=>'description']) }}
	        	@if($errors->has('description'))
		        	<span style="color:red;">{{ $errors->first('description') }}</span>
		        @endif
		        
	        {{ Form::label('Memo: ') }}
	        {{ Form::textarea('memo', $data->memo, ['class'=>'form-control', 'id'=>'memo', 'rows'=>4]) }}
	        	@if($errors->has('memo'))
		        	<span style="color:red;">{{ $errors->first('memo') }}</span>
		        @endif
				
				<?php //$cashInHand = 38000; ?>
				
				{{ Form::label('Cash In Hand: ') }} 
				{{ Form::text('cashInHand', number_format($cashInHand), ['class'=>'form-control', 'id'=>'cashInHand','readonly']) }}
	        	
		        
	        {{ Form::label('Amount: ') }}
	        {{ Form::text('amount', $data->amount, ['class'=>'form-control', 'id'=>'amount']) }}
	        	@if($errors->has('amount'))
		        	<span style="color:red;">{{ $errors->first('amount') }}</span>
		        @endif

             {{ Form::label('Quantity: ') }}
          {{ Form::text('quantity', $data->quantity, ['class'=>'form-control', 'id'=>'quantity']) }}
            @if($errors->has('quantity'))
              <span style="color:red;">{{ $errors->first('quantity') }}</span>
            @endif
			
			{{ Form::hidden('id', $data->id, ['id'=>'id']) }}
		
			{{ Form::token() }}

			<p>{{ Form::submit('Save') }}
			
            {{ Form::close(); }}
  
@stop