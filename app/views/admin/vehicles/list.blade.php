@extends('layout.default')

@section('content')


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<div class="clearfix">
  		<h3 class="panel-title pull-left">Vehicles</h3>
  		<a href="{{ URL::to('vehicle/add') }}" class="btn btn-success btn-xs pull-right ">Add New</a>
  	</div>

  </div>
  <!-- Table -->
  <table class="table">
    <tr>
    	<th>#</th>
    	<th>Vehicle Number Plate</th>
      <th>Vehicle Capacity</th>
    	<th>Action</th>
    </tr>
    @foreach($vehicles as $vehicle)
    <tr>
    	<td>{{ $vehicle->id }}</td>
    	<td>{{ $vehicle->numberPlate }}</td>
      <td>{{ $vehicle->capacity }}</td>
    	<td><a href="{{ URL::to('vehicle/'.$vehicle->id.'/edit') }}"><img title="edit" id="{{ $vehicle->id }}" src="icons/edit.svg"></a>	&nbsp; &nbsp; &nbsp;	<img data-toggle="modal" id="vehicle/{{ $vehicle->id }}" data-target="#myModal_delete" class="delete_item" src="icons/delete.svg"></td>
    </tr>
    @endforeach
  </table>
</div>



							<!-- DELETE A vehicle -->

<!-- Modal -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete a vehicle</h3>
      </div>
      <div class="modal-body">
	      	<h5>Are you sure you want to delete this vehicle?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <a id="btn_delete_item" class="btn btn-danger"><span class="glyphicon glyphicon-ok"></span> Delete</a>
      </div>
    </div>
  </div>
</div>

@stop


	
