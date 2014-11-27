<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{	
		$clients = Client::all();
		return View::make('admin.clients.list')->with('clients', $clients);
	}

	public function showReport($id)
	{

		$client = Client::find($id);

		$total_payments	=	$client->allPayments();

		$total_charges = $client->allCharges()->charges;

		$balance = $client->balance();

		return View::make('admin.clients.report')
					->with('client', $client)
					->with('total_payments', $total_payments)
					->with('total_charges', $total_charges)
					->with('balance', $balance);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.clients.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$validation = Validator::make($data, [
				'clientName'	=>	'required|min:3',
				'phone'			=>	'required|min:6',
				'address'		=>	'required'
			]);

		if($validation->fails()){
			return Redirect::route('getAddClient')->withErrors($validation)->withInput();

		} else {

			$client = Client::create([
					'clientName'	=> 	Input::get('clientName'),
					'phone'			=>	Input::get('phone'),
					'address'		=>	Input::get('address')
				]);
			if($client){
				return Redirect::route('getClients')->with('success','Client added successfully');
			} else {
				return Redirect::route('getClients')->with('fail','An error occurred while creating a new client');
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::find($id);

		return View::make('admin.clients.edit')->with('data', $client);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		$id = (int)Input::get('id_edit');

		$validation = Validator::make(Input::all(), [
				'clientName_edit'	=>	'required|min:5',
				'phone_edit'			=>	'required|min:6',
				'address_edit'		=>	'required'
			]);

		if($validation->fails()){
			return Redirect::route('getEditClient', $id)->withInput()->withErrors($validation);
		} else {

		}

		$client = Client::find($id);

		$client->clientName = Input::get('clientName_edit');
		$client->phone		= Input::get('phone_edit');
		$client->address 	= Input::get('address_edit');

		if($client->save()){
			return Redirect::route('getClients')->with('success','Client edited successfully');
		} else {
			return Redirect::route('getClients')->with('fail','There was an error editing the client');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = Client::find($id);

		if($client->balance() > 0)
		{
			return Redirect::route('getClients')->with('fail','Deletion failed. The client has outstanding balance of Ksh: '. $client->balance());
			die;
		}

		$client->transport()->delete();

		$client->payment()->delete();

		$client->delete();

		return Redirect::route('getClients')->with('success','Client deleted successfully');
		
	}


}
