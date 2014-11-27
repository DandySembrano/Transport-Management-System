@extends('layout.default')

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<div class="clearfix">
  		<h3 class="panel-title pull-left">{{ $client->clientName }}'s Info</h3>
      <img src="../../icons/print.svg" class="pull-right no-print" id="print">

  	</div>

  </div>
  <!-- Client Detail's Table -->
  <table class="table">
    <tr>
    	<th>#</th>
    	<th>Name</th>
    	<th>Phone</th>
    	<th>Address</th>
    </tr>
    <tr>
    	<td>{{ $client->id }}</td>
    	<td>{{ $client->clientName }}</td>
    	<td>{{ $client->phone }}</td>
    	<td>{{ $client->address }}</td>
    </tr>
  </table>
</div>



@if (count($client->transport) == 0 && count($client->payment) == 0)

@else
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <div class="clearfix">
      <h3 class="panel-title pull-left">Summary</h3>
    </div>

  </div>
  <!-- Client Detail's Table -->
  <table class="table">
    <tr>

      <th>Total Charges</th>
      <th>Total Payments</th>
      <th>Total Balance</th>

    </tr>
    <tr>
      <td> {{ $total_charges }} </td>
      <td> {{ $total_payments }} </td>
      <td> {{ $balance }} </td>
    </tr>

  </table>

  
</div>
@endif


@if (count($client->transport) == 0)
  <br><small>The user has no transport records</small>
@else
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<div class="clearfix">
  		<h3 class="panel-title pull-left">Transport</h3>
  	</div>

  </div>
  <!-- Client Detail's Table -->
  <table class="table">
    <tr>
    	<th>#</th>
    	<th>Destination</th>
    	<th>Description</th>
    	<th>Tonnes</th>
    	<th>Charges</th>
    	<th>Memo</th>
      <th>Date</th>
    </tr>
    @foreach ($client->transport as $trans)
    <tr>
    	<td> {{ $trans->id }}</td>
		<td> {{ $trans->destination }}</td>
		<td> {{ $trans->description }}</td>
		<td> {{ $trans->tonnes }}</td>
		<td> {{ $trans->charges }}</td>
		<td> {{ $trans->memo }}</td>
    <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $trans->created_at)->format('d/m/Y h:i a'); ?>
    <td>{{ $date }}</td>
    </tr>
    @endforeach
  </table>
</div>
@endif


@if (count($client->payment) == 0)
  <br><small>The user has no payment records</small>
@else
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <div class="clearfix">
      <h3 class="panel-title pull-left">Payments</h3>
    </div>

  </div>
  <!-- Client Detail's Table -->
  
    
  <table class="table">
    <tr>
      <th>#</th>
      <th>Amount</th>
      <th>Mode</th>
      <th>Cheque Name</th>
      <th>Cheque Number</th>
      <th>Date</td>
    </tr>
    @foreach ($client->payment as $pay)
      <tr>  
      <td> {{ $pay->id }} </td>
      <td> {{ $pay->amount }} </td>
      <td> {{ $pay->mode }} </td>
      <td> {{ $pay->chequeName }} </td>
      <td> {{ $pay->chequeNumber }} </td>
      <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $pay->created_at)->format('d/m/Y h:i a'); ?>
      <td> {{ $date }}</td>
      </tr>
    @endforeach
  </table>
  
</div>
@endif




@stop

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#print').click(function(){
        window.print();
      });
  });
    
</script>
@stop

	

