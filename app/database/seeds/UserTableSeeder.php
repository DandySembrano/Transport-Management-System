<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();

		User::create( [
				'username' => 'admin',
				'password'	=> Hash::make('admin'),
				'remember_token'	=> '',
				'active'		=>0
			]);

		DB::table('clients')->truncate();

		Client::create( [
				'clientName' => 'Abdi Yusuf',
				'phone'	=> '0734561661',
				'address'	=> 'P.O Box 20, Kwale'
			]);
		Client::create( [
				'clientName' => 'Tony Kroos',
				'phone'	=> '0723434661',
				'address'	=> 'P.O Box 22 Mombasa'
			]);
		Client::create( [
				'clientName' => 'Peter Waweru',
				'phone'	=> '0721839391',
				'address'	=> 'P.O Box 10, Kilifi'
			]);

		DB::table('vehicles')->truncate();

		Vehicle::create([
			'numberPlate'	=> 'KBU 449H',
			'capacity'		=>	'1400 tonnes'
			]);

		Vehicle::create([
			'numberPlate'	=> 'KBZ 299P',
			'capacity'		=>	'800 tonnes'
			]);

		Vehicle::create([
			'numberPlate'	=> 'KBQ 287E',
			'capacity'		=>	'700 tonnes'
			]);

		Vehicle::create([
			'numberPlate'	=> 'KBB 347G',
			'capacity'		=>	'400 tonnes'
			]);

		DB::table('transport')->truncate();

		
		Transport::create([
			'client_id'		=> 	1,
			'vehicle_id'	=>	1,
			'destination'	=>	'Garissa',
			'description'	=>	'Maize 50kg Bags',
			'tonnes'		=>	6,
			'charges'		=>	10000,
			'memo'			=>	'short memo goes here'

		]);

		Transport::create([
			'client_id'		=> 	2,
			'vehicle_id'	=>	2,
			'destination'	=>	'Lamu',
			'description'	=>	'Rice 50kg Bags',
			'tonnes'		=>	3,
			'charges'		=>	20000,
			'memo'			=>	'short memo goes here'

		]);

		Transport::create([
			'client_id'		=> 	3,
			'vehicle_id'	=>	3,
			'destination'	=>	'Garissa',
			'description'	=>	'Sugar 25kg Bags',
			'tonnes'		=>	5,
			'charges'		=>	25000,
			'memo'			=>	'short memo goes here'

		]);

		DB::table('payments')->truncate();

		
		Payment::create([
			'client_id'		=> 	1,
			'amount'	=>	15000,
			'mode'	=>	'cheque',
			'chequeName'	=>	'Richy Bla',
			'chequeNumber'		=>	43543056576
		]);

		Payment::create([
			'client_id'		=> 	2,
			'amount'	=>	10000,
			'mode'	=>	'cheque',
			'chequeName'	=>	'Rose Bla',
			'chequeNumber'		=>	43456576
		]);

		Payment::create([
			'client_id'		=> 	3,
			'amount'	=>	18000,
			'mode'	=>	'cash'
		]);
		
		DB::table('expenses')->truncate();

		
		Expense::create([
			'description'		=> 	'Rent',
			'amount'	=>	15000,
			'memo'	=>	'short memo',
			'quantity'	=>	1
		]);
		
		Expense::create([
			'description'		=> 	'Electrity',
			'amount'	=>	1000,
			'memo'	=>	'short memo',
			'quantity'	=>	1
		]);
		Expense::create([
			'description'		=> 	'Licence',
			'amount'	=>	18000,
			'memo'	=>	'short memo',
			'quantity'	=>	1
		]);

		
	}

}
