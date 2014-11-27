@extends('layout.default')

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<div class="clearfix">
  		<h3 class="panel-title pull-left">Expenses </h3>
  		<a href="{{ URL::to('expense/add') }}" class="btn btn-success btn-xs pull-right ">Add New</a>
  	</div>

  </div>
  <!-- Table -->
  <table class="table">
    <tr>
    	<th>#</th>
    	<th>Description</th>
		<th>Memo</th>
    	<th>Amount</th>
    	<th>Quantity</th>
		<th>Total</th>
    	<th>Action</th>
    </tr>
    @foreach($expenses as $expense)
    <tr>
    	<td>{{ $expense->id }}</td>
    	<td>{{ $expense->description }}</td>
    	<td>{{ $expense->memo }}</td>
    	<td>{{ $expense->amount }}</td>
		<td>{{ $expense->quantity }}</td>
		<td>{{ $expense->amount * $expense->quantity}}</td>
    	<td><a href="{{ URL::to('expense/'.$expense->id.'/edit') }}"><img src="icons/edit.svg" title="edit" class="glyphicon glyphicon-edit edit_expense"></a>	&nbsp; &nbsp; &nbsp;	<img data-toggle="modal" id="expense/{{ $expense->id }}" data-target="#myModal_delete" class="delete_item" src="icons/delete.svg"</span></td>
    </tr>
    @endforeach
  </table>
</div>

									


							<!-- DELETE A CLIENT -->

<!-- Modal -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete a client</h3>
      </div>
      <div class="modal-body">
	      	<h5>Are you sure you want to delete this client?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <a id="btn_delete_item" class="btn btn-danger"><span class="glyphicon glyphicon-ok"></span> Delete</a>
      </div>
    </div>
  </div>
</div>

@stop



	
