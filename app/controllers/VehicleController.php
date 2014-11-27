<?php

class VehicleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$vehicles = Vehicle::all();
		
		return View::make('admin.vehicles.list')->with('vehicles', $vehicles);
	}

	public function showReport($id){

		$transport = Transport::all();

		$vehicle = Vehicle::find((int)$id);

		return View::make('admin.vehicles.report')->with('transport', $transport)->with('vehicle', $vehicle);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.vehicles.add');
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
				'numberPlate'	=>	'required',
				'capacity'		=>	'required'
			]);

		if($validation->fails()){
			return Redirect::route('getAddVehicle')->withErrors($validation)->withInput();

		} else {

			$vehicle = vehicle::create([
					'numberPlate'	=> 	Input::get('numberPlate'),
					'capacity'		=>	Input::get('capacity')
				]);
			if($vehicle){
				return Redirect::route('getVehicles')->with('success','Vehicle added successfully');
			} else {
				return Redirect::route('getVehicles')->with('fail','An error occurred while creating a new vehicle');
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

		return View::make('admin.vehicles.edit')->with('data', Vehicle::find($id));
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
				'numberPlate_edit'	=>	'required',
				'capacity_edit'		=>	'required'
			]);

		if($validation->fails()){
			return Redirect::route('getEditVehicle', $id)->withErrors($validation)->withInput();

		} else {
			$vehicle = Vehicle::find($id);

			$vehicle->numberPlate = Input::get('numberPlate_edit');
			$vehicle->capacity = Input::get('capacity_edit');

			if($vehicle->save()){
				return Redirect::route('getVehicles')->with('success','Vehicle edited successfully');
			} else {
				return Redirect::route('getVehicles')->with('fail','There was an error editing the vehicle');
			}

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
		$vehicle = Vehicle::find($id);

		$vehicle->delete();

		return Redirect::route('getVehicles')->with('success','Vehicle deleted successfully');
	}


}
