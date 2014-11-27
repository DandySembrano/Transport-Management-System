@extends('layout.default')

@section('content')

          {{Form::open(array('url' => URL::route('postUpdateVehicle'), 'id'=>'edit_vehicle_form'))}}

          {{ Form::label('Vehicle Number Plate: ') }}  
          {{ Form::text('numberPlate_edit', $data->numberPlate, ['class'=>'form-control', 'id'=>'numberPlate_edit']) }}
            @if($errors->has('numberPlate_edit'))
              <p style="color:red;">{{ $errors->first('numberPlate_edit') }}</p>
            @endif
            <br>
            {{ Form::label('Vehicle Capacity: ') }}  
          {{ Form::text('capacity_edit', $data->capacity, ['class'=>'form-control', 'id'=>'capacity_edit']) }}
            @if($errors->has('capacity_edit'))
              <p style="color:red;">{{ $errors->first('capacity_edit') }}</p>
            @endif

            {{ Form::hidden('id_edit', $data->id, ['class'=>'form-control', 'id'=>'id_edit','readonly']) }}

            <p>{{ Form::submit('Edit') }}
            {{ Form::close(); }}

@stop