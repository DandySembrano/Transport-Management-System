<?php

class TransportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$transports = Transport::all();
		
		return View::make('admin.transport.list')->with('transports', $transports);

		//return $transports;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.transport.add');
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
				'client_id'		=>	'required',
				'vehicle_id'	=>	'required',
				'destination'	=>	'required',
				'description'	=>	'required',
				'tonnes'		=>	'required|numeric',
				'charges'		=>	'required|numeric',
				'memo'			=>	''
			]);

		if($validation->fails()){
			return Redirect::route('getAddTransport')->withErrors($validation)->withInput();

		} else {

			$transport = Transport::create([
					'client_id'		=>	Input::get('client_id'),
					'vehicle_id'	=>	Input::get('vehicle_id'),
					'destination'	=>	Input::get('destination'),
					'description'	=>	Input::get('description'),
					'tonnes'		=>	Input::get('tonnes'),
					'charges'		=>	Input::get('charges'),
					'memo'			=>	Input::get('memo')
				]);
			if($transport){
				return Redirect::route('getTransport')->with('success','Transport added successfully');
			} else {
				return Redirect::route('getTransport')->with('fail','An error occurred while creating a new transport');
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
		$transport = Transport::find($id);

		return View::make('admin.transport.edit')->with('transport', $transport);
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
				'client_id'		=>	'required',
				'vehicle_id'	=>	'required',
				'destination'	=>	'required',
				'description'	=>	'required',
				'tonnes'		=>	'required|numeric',
				'charges'		=>	'required|numeric'
				//'memo'			=>	''
			]);

		$transport = Transport::find($id);

		$transport->client_id 	=	Input::get('client_id_edit');
		$transport->vehicle_id	=	Input::get('vehicle_id_edit');
		$transport->destination	=	Input::get('destination_edit');
		$transport->description	=	Input::get('description_edit');
		$transport->tonnes 		=	Input::get('tonnes_edit');
		$transport->charges 	=	Input::get('charges_edit');
		$transport->memo 		=	Input::get('memo_edit');

		if($transport->save()){
			return Redirect::route('getTransport')->with('success','Transport edited successfully');
		} else {
			return Redirect::route('getTransport')->with('fail','There was an error editing the Transport');
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
		$transport = Transport::find($id);

		$transport->delete();

		return Redirect::route('getTransport')->with('success','Transport deleted successfully');
	}


}
