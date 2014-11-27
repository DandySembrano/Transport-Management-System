<?php

class Vehicle extends Eloquent
{
	protected $table = 'vehicles';

	protected $fillable = ['numberPlate', 'capacity'];

	public function transport(){

		return $this->hasMany('Transport');

	}

}