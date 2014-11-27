@extends('layout.default')


@section('content')


		{{Form::open(array('url' => URL::route('postUpdateTransport'), 'id'=>'edit_transport_form'))}}

	        {{ Form::label('Client Name: ') }}
          <div class="form-group"> 
            {{ Form::select('client_id_edit', Client::lists('clientName','id'), $transport->client_id, ['class'=>'form-control', 'id'=>'client_id_edit']) }}
              @if($errors->has('client_id_edit'))
                <p style="color:red;">{{ $errors->first('client_id_edit') }}</p>
              @endif
          </div>

            {{ Form::label('Vehicle Number Plate: ') }} 
            <div class="form-group ">  
          {{ Form::select('vehicle_id_edit', Vehicle::lists('numberPlate','id'), $transport->vehicle_id, ['class'=>'form-control', 'id'=>'vehicle_id_edit']) }}
            @if($errors->has('vehicle_id_edit'))
              <p style="color:red;">{{ $errors->first('vehicle_id_edit') }}</p>
            @endif
          </div>
           
            <div class="form-group">
              {{ Form::label('Destination: ') }} 
              
              {{ Form::text('destination_edit', $transport->destination, ['class'=>'form-control', 'id'=>'destination_edit']) }}
                </div>
              @if($errors->has('destination_edit'))
                <p style="color:red;">{{ $errors->first('destination_edit') }}</p>
              @endif
          
            

            {{ Form::label('Description: ') }}
                <div class="form-group">   
                  {{ Form::text('description_edit', $transport->description, ['class'=>'form-control', 'id'=>'description_edit']) }}
                </div>
                @if($errors->has('description_edit'))
                  <p style="color:red;">{{ $errors->first('description_edit') }}</p>
                @endif
          
           

            {{ Form::label('Tonnes: ') }}  
            <div class="form-group"> 
              {{ Form::text('tonnes_edit', $transport->tonnes, ['class'=>'form-control', 'id'=>'tonnes_edit']) }}
                @if($errors->has('tonnes_edit'))
                  <p style="color:red;">{{ $errors->first('tonnes_edit') }}</p>
                @endif
          </div>

            {{ Form::label('Charges: ') }}
            <div class="form-group">   
            {{ Form::text('charges_edit', $transport->charges, ['class'=>'form-control', 'id'=>'charges_edit']) }}
              @if($errors->has('charges_edit'))
                <p style="color:red;">{{ $errors->first('charges_edit') }}</p>
              @endif
          </div>

            {{ Form::label('Memo: ') }}  
            <div class="form-group"> 
          {{ Form::textarea('memo_edit', $transport->memo, ['class'=>'form-control', 'id'=>'memo_edit','rows'=>4]) }}
            @if($errors->has('memo_edit'))
              <p style="color:red;">{{ $errors->first('memo_edit') }}</p>
            @endif
          </div>
            <br>

		        {{ Form::hidden('id_edit', $transport->id, ['class'=>'form-control', 'id'=>'id_edit','readonly']) }}

             {{ Form::submit('Edit', ['class'=>'btn btn-primary']) }}
            {{ Form::close() }}


@stop