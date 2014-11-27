<?php

use Illuminate\Support\MessageBag as MessageBag;

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$payments	=	Payment::fetchAll();

		$payments	=	Payment::all();

		return View::make('admin.payments.list')->with('payments', $payments);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.payments.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validation = Validator::make(Input::all(), [
				'client_id'		=>	'required',
				'amount'		=>	'required|numeric',
				'mode'			=>	'required',
				'chequeName'	=>	'',
				'chequeNumber'	=>	'numeric'
			]);

		$errorMessages = new MessageBag;

		

		if($validation->fails()){
			$errorMessages->merge($validation->errors()->toArray());
		}

		if(Input::has('mode')){
			if(Input::get('mode') == 'cash'){
				if(Input::has('chequeNumber') || Input::has('chequeName')){
					$errorMessages->add('mode', 'You cannot put cheque details on cash payments');
					
				}
			} else {
				if(Input::get('chequeNumber') == '' || Input::get('chequeNumber') == null){
					$errorMessages->add('chequeNumber', 'Please enter the Cheque Number');
					
				}

				if(Input::get('chequeName') == '' || Input::get('chequeName') == null){
					$errorMessages->add('chequeName', 'Please enter the Cheque Name');
					
				}
			}
		}

		if(count($errorMessages) > 0){
			return Redirect::route('getAddPayment')
									->withErrors($errorMessages)
									->withInput();
		} else {

			$chequeNumber = (Input::get('chequeNumber') != '') ? Input::get('chequeNumber') : null;
			$chequeName = (Input::get('chequeName') != '') ? Input::get('chequeName') : null;

			$payment = Payment::create([
					'client_id'		=>	Input::get('client_id'),
					'mode'			=>	Input::get('mode'),
					'amount'		=>	Input::get('amount'),
					'chequeName'	=>	$chequeName,
					'chequeNumber'	=>	$chequeNumber
				]);

			if($payment){
				return Redirect::route('getPayments')->with('success','Payments saved successfully');
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

		return View::make('admin.payments.edit')->with('data', Payment::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{	

		$validation = Validator::make(Input::all(), [
				'client_id_edit'	=>	'required',
				'amount_edit'		=>	'required|numeric',
				'mode_edit'			=>	'required',
				'chequeName_edit'	=>	'',
				'chequeNumber_edit'	=>	'numeric'
			]);

		$errorMessages = new Illuminate\Support\MessageBag;

		

		if($validation->fails()){
			$errorMessages->merge($validation->errors()->toArray());
		}

		if(Input::has('mode_edit')){
			if(Input::get('mode_edit') == 'cash'){
				if(Input::has('chequeNumber_edit') || Input::has('chequeName_edit')){
					$errorMessages->add('chequeName_edit', 'You cannot put cheque details on cash payments');
					
				}
			} else {
				if(Input::get('chequeNumber_edit') == '' || Input::get('chequeNumber_edit') == null){
					$errorMessages->add('chequeNumber_edit', 'Please enter the Cheque Number');
					
				}

				if(Input::get('chequeName_edit') == '' || Input::get('chequeName_edit') == null){
					$errorMessages->add('chequeName_edit', 'Please enter the Cheque Name');
					
				}
			}
		}

		$id = (int)Input::get('id_edit');

		if(count($errorMessages) > 0){
			return Redirect::route('getEditPayment', $id)
									->withErrors($errorMessages)
									->withInput();
		} else {

			$chequeNumber = (Input::get('chequeNumber_edit') != '') ? Input::get('chequeNumber_edit') : null;
			$chequeName = (Input::get('chequeName_edit') != '') ? Input::get('chequeName_edit') : null;

			$payment = Payment::find($id);

					$payment->client_id		=	Input::get('client_id_edit');
					$payment->mode			=	Input::get('mode_edit');
					$payment->amount		=	Input::get('amount_edit');
					$payment->chequeName	=	$chequeName;
					$payment->chequeNumber	=	$chequeNumber;
				

			if($payment->save()){
				return Redirect::route('getPayments')->with('success','Payments edited successfully');
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
		$payment = Payment::find($id);

		if($payment->delete()){
			return Redirect::route('getPayments')->with('success','Payment deleted successfully');
		}
	}


}
