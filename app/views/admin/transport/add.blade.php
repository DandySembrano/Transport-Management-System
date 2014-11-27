@extends('layout.default')

@section('content')


          {{Form::open(['url'=>URL::route('postCreateTransport'),'id'=>'add_transport_form'])}}
          <div class="form-group">
            {{ Form::label('Client Name: ') }}  
            {{ Form::select('client_id', [''=>'Select'] +  Client::lists('clientName','id'),'', ['class'=>'form-control', 'id'=>'client_id']) }}
              @if($errors->has('client_id'))
                <span style="color:red;">{{ $errors->first('client_id') }}</span>
              @endif
          </div>

            {{ Form::label('Vehicle Number Plate: ') }}  
          {{ Form::select('vehicle_id', [''=>'Select'] +  Vehicle::lists('numberPlate','id'), '', ['class'=>'form-control', 'id'=>'vehicle_id']) }}
            @if($errors->has('vehicle_id'))
              <span style="color:red;">{{ $errors->first('vehicle_id') }}</span>
            @endif
           
            {{ Form::label('Destination: ') }}  
          {{ Form::text('destination', Input::old('destination'), ['class'=>'form-control', 'id'=>'destination']) }}
            @if($errors->has('destination'))
              <span style="color:red;">{{ $errors->first('destination') }}</span>
            @endif
            

            {{ Form::label('Description: ') }}  
          {{ Form::text('description',Input::old('description'), ['class'=>'form-control', 'id'=>'description']) }}
            @if($errors->has('description'))
              <span style="color:red;">{{ $errors->first('description') }}</span>
            @endif
           

            {{ Form::label('Tonnes: ') }}  
          {{ Form::text('tonnes', Input::old('tonnes'), ['class'=>'form-control', 'id'=>'tonnes']) }}
            @if($errors->has('tonnes'))
              <span style="color:red;">{{ $errors->first('tonnes') }}</span>
            @endif

            {{ Form::label('Charges: ') }}  
          {{ Form::text('charges', Input::old('charges'), ['class'=>'form-control', 'id'=>'charges','placeholder'=>'charges per tonne']) }}
            @if($errors->has('charges'))
              <span style="color:red;">{{ $errors->first('charges') }}</span>
            @endif

            {{ Form::label('Memo: ') }}  
          {{ Form::textarea('memo', Input::old('memo'), ['class'=>'form-control', 'id'=>'memo','rows'=>4]) }}
            @if($errors->has('memo'))
              <span style="color:red;">{{ $errors->first('memo') }}</span>
            @endif
            <br>
            {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
            {{ Form::close() }}


@stop