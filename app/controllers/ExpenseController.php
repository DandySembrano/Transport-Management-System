<?php

use Illuminate\Support\MessageBag as MessageBag;

class ExpenseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function index()
	{
	
		return View::make('admin.expense.list')->with( 'expenses', Expense::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	

		return View::make('admin.expense.add')->with('cashInHand', Expense::cashInHand());
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
			'description'	=>	'required|min:3',
			'memo'			=>	'',
			'amount'		=>	'required|numeric',
			'quantity'		=>	'required|numeric'
		]);
		
		$errorMessages = new MessageBag;
		
		if($validation->fails()){
			$errorMessages->merge($validation->errors()->toArray());
		}
		
		//$cash = new Expense;
		
		$cashInHand = Expense::cashInHand();
		
		$ex = ($data['amount'] * $data['quantity']);
		
		if($ex > $cashInHand){
			$errorMessages->add('amount', 'You cannot make an expense exceeding cash in hand');
		}
		
		//return dd($errorMessages);
		//die;
		
		if(count($errorMessages) > 0){
			return Redirect::route('getAddExpense')
					->withInput()
					->withErrors($errorMessages);
		} else {
			$expense = Expense::create([
				'description'	=> 	$data['description'],
				'amount'		=>	$data['amount'],
				'memo'			=>	$data['memo'],
				'quantity'		=>	$data['quantity']
			]);
			
			if($expense){
				return Redirect::route('getExpenses')->with('success','Expense added successfully');
			} else {
				return Redirect::route('getExpenses')->with('fail','An error occured while saving the expense');
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
		
		return View::make('admin.expense.edit')->with('data', Expense::find($id))->with('cashInHand', Expense::cashInHand());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = Input::get('id');
		
		$validation = Validator::make(Input::all(),
		[
			'description'	=>	'required',
			'memo'			=>	'',
			'amount'		=>	'required|numeric',
			'quantity'		=>	'required|numeric'
		]);
		
		$errorMessages = new MessageBag;
		
		if($validation->fails()){
			$errorMessages->merge($validation->errors()->toArray());
		}
		
		$data = Input::all();
		
		$cashInHand = Expense::cashInHand();
		
		$ex = ($data['amount'] * $data['quantity']);
		
		if($ex > $cashInHand){
			$errorMessages->add('amount', 'You cannot make an expense exceeding cash in hand');
		}
		
		if(count($errorMessages) > 0){
			return Redirect::route('getExpenses')
					->withInput()
					->withErrors($errorMessages)
					->with('modal','#myModal');
		} else {
			$expense = Expense::find($id);
			
			$expense->description = Input::get('description');
			$expense->memo = Input::get('memo');
			$expense->amount = Input::get('amount');
			$expense->quantity = Input::get('quantity');
			
			if($expense->save()){
				return Redirect::route('getExpenses')->with('success', 'Edited successfully');
			} else {
				return Redirect::route('getExpenses')->with('fail', 'An error ocurred while editing the expense');
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
		$expense = Expense::find($id);
		
		$expense->delete();
		
		return Redirect::route('getExpenses')->with('success', 'Expense was deleted');
	}


}
