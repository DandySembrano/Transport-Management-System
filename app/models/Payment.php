<?php

class Payment extends Eloquent
{
	protected $table = 'payments';

	protected $fillable = ['client_id', 'amount', 'mode', 'chequeName', 'chequeNumber'];

	public static function fetchAll(){

		// return DB::table('payments')	
		// 			->join('clients','clients.id','=','payments.client_id')
		// 			->select('payments.*', 'clients.clientName')
		// 			->get();
	}

	public function client(){

		return $this->belongsTo('Client');

	}
}