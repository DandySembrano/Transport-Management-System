@extends('layout.default')

@section('content')
		

		@if(Auth::check())

		<h1>Welcome to Homepage</h1>

		<br>

		<h3> Hello {{ Auth::user()->username }}<h3>

		<br>	

		<h2><img src="icons/clients.svg"> {{ $total_clients }} clients</h2>
		<h2><img src="icons/truck.svg"> {{ $total_vehicles }} Trucks</h4>
		<h2> <img src="icons/cash.svg"> Ksh: {{ number_format($total_payments) }} total money collected</h4>
		<h2> <img src="icons/cash.svg"> Ksh: {{ number_format($total_expenses) }} total expenses</h4>
		<br>
		<h2> <img src="icons/cash.svg"> Ksh: {{ number_format($total_cash_in_hand) }} Cash In Hand</h4>

		@else
			<h4>Please <a href="{{ URL::to('user/signin') }}">login</a> to continue</h4>
		@endif
	
@stop




