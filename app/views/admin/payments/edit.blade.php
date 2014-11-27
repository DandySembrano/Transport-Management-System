@extends('layout.default')

@section('content')

	      	{{Form::open(['url'=>URL::route('postUpdatePayment'),'id'=>'edit_payment_form'])}}

          {{ Form::label('Client Name: ') }}  
          {{ Form::select('client_id_edit', [''=>'Select'] + Client::lists('clientName','id'), $data->client_id, ['class'=>'form-control', 'id'=>'clientName_edit']) }}
            @if($errors->has('client_id_edit'))
              <span style="color:red;">{{ $errors->first('client_id_edit') }}</span>
            @endif
            
          {{ Form::label('Amount: ') }}
          {{ Form::text('amount_edit', $data->amount, ['class'=>'form-control', 'id'=>'amount_edit']) }}
            @if($errors->has('amount_edit'))
              <span style="color:red;">{{ $errors->first('amount_edit') }}</span>
            @endif
            
          {{ Form::label('Mode: ') }}
          {{ Form::select('mode_edit', [''=>'Select','cash'=>'Cash','cheque'=>'Cheque'], $data->mode, ['class'=>'form-control', 'id'=>'mode_edit']) }}
            @if($errors->has('mode_edit'))
              <span style="color:red;">{{ $errors->first('mode_edit') }}</span>
            @endif

             {{ Form::label('Cheque Name: ') }}
          {{ Form::text('chequeName_edit', $data->chequeName, ['class'=>'form-control', 'id'=>'chequeName_edit']) }}
            @if($errors->has('chequeName_edit'))
              <span style="color:red;">{{ $errors->first('chequeName_edit') }}</span>
            @endif

             {{ Form::label('Cheque Number: ') }}
          {{ Form::text('chequeNumber_edit', $data->chequeNumber, ['class'=>'form-control', 'id'=>'chequeNumber_edit']) }}
            @if($errors->has('chequeNumber_edit'))
              <span style="color:red;">{{ $errors->first('chequeNumber_edit') }}</span>
            @endif

            {{ Form::hidden('id_edit', $data->id, ['id'=>'id_edit']) }}

            <p>{{ Form::submit('Edit') }}
            {{ Form::close(); }}


@stop