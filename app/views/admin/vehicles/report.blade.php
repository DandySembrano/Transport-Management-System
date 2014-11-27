<p>Vehicle: {{ $vehicle->numberPlate }}

@foreach ($transport as $t)

	@if($t->vehicle_id == $vehicle->id)
	
	<p>Destination: {{ $t->destination }}

	@endif

@endforeach