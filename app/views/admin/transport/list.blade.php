@extends('layout.default')

@section('content')


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<div class="clearfix">
  		<h3 class="panel-title pull-left">Transport List</h3>
  		<a href="{{ URL::route('getAddTransport') }}" class="btn btn-success btn-xs pull-right ">Add New</a>
  	</div>

  </div>
  <!-- Table -->
  <table class="table">
    <tr>
    	<th>#</th>
    	<th>Client Name</th>
      <th>Vehicle Number Plate</th>
      <th>Destination</th>
      <th>Description</th>
      <th>Tonnes</th>
      <th>Charges</th>
      <th>Memo</th>
      <th>Date</th>
    	<th>Action</th>
    </tr>
    @foreach($transports as $data)
    <tr>
    	<td>{{ $data->id }}</td>
      <td>{{ $data->client->clientName }}</td>
      <td>{{ $data->vehicle->numberPlate }}</td>
      <td>{{ $data->destination }}</td>
      <td>{{ $data->description }}</td>
    	<td>{{ $data->tonnes }}</td>
      <td>{{ $data->charges }}</td>
      <td>{{ $data->memo }}</td>
      <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y h:i a'); ?>
      <td>{{ $date }}</td>
    	<td><a href="<?php echo URL::Route('getEditTransport',['id'=>$data->id]); ?>" title="edit"  class="glyphicon glyphicon-edit edit_transport"><img src="icons/edit.svg"></a>	&nbsp; &nbsp; &nbsp;	<img data-toggle="modal" id="transport/{{ $data->id }}" data-target="#myModal_delete" class="delete_item" src="icons/delete.svg"></td>
    </tr>
    @endforeach 
  </table>

</div>




              <!-- DELETE A transport -->

<!-- Modal -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete a transport</h3>
      </div>
      <div class="modal-body">
          <h5>Are you sure you want to delete this transport record?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <a id="btn_delete_item" class="btn btn-danger"><span class="glyphicon glyphicon-ok"></span> Delete</a>
      </div>
    </div>
  </div>
</div>


@stop



	
