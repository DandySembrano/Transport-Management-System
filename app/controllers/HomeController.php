<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{

		$total_clients = Client::all();
		$total_vehicles = Vehicle::all();
		$total_payments = DB::table('payments')->sum('amount');
		$total_expenses = Expense::getAllExpenses();
		$total_cash_in_hand = Expense::cashInHand();

		return View::make('dashboard')
					->with('total_clients', $total_clients->count())
					->with('total_vehicles', $total_vehicles->count())
					->with('total_payments', $total_payments)
					->with('total_cash_in_hand', $total_cash_in_hand)
					->with('total_expenses', $total_expenses);
	}

}
