<?php

class Client extends Eloquent
{
	protected $table = 'clients';

	protected $fillable = ['clientName', 'phone', 'address'];

	//protected $client = $this;

	public function transport(){
		
		return $this->hasMany('Transport');
	}

	public function payment(){

		return $this->hasMany('Payment');

	}

	public function allPayments()
	{
		return $this->payment->sum('amount');
	}

	public function allCharges()
	{
		return DB::table('transport')
			        ->select(DB::raw('sum(tonnes*charges) AS charges'))
			        ->where('client_id', $this->id)->first();
	}

	public function balance()
	{
		return $this->allCharges()->charges - $this->allPayments();
	}
	
}