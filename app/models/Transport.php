<?php

class Transport extends Eloquent
{
	protected $table = 'transport';

	protected $fillable = ['client_id', 'vehicle_id', 'destination', 'description', 'tonnes', 'charges', 'memo'];

	public static function fetchAll(){

		// return DB::table('transport')	
		// 					->join('clients','clients.id','=','transport.client_id')
		// 					->join('vehicles','vehicles.id','=','transport.vehicle_id')
		// 					->select('transport.*', 'clients.clientName','vehicles.numberPlate')
		// 					->get();

	}

	public function client(){

		return $this->belongsTo('Client');

	}

	public function vehicle(){

		return $this->belongsTo('Vehicle');

	}


	
}