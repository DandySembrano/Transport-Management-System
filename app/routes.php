<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['uses'=>'HomeController@index', 'as'=>'home']);

Route::group(array('before'=>'auth'), function(){

	Route::get('user', function(){
		return View::make('admin.user.profile');
	});

		//Clients
	Route::get('clients', ['uses'=>'ClientController@index', 'as'=>'getClients']);
	Route::get('vehicles', ['uses'=>'VehicleController@index', 'as'=>'getVehicles']);
	Route::get('transport', ['uses'=>'TransportController@index', 'as'=>'getTransport']);
	Route::get('payments', ['uses'=>'PaymentController@index', 'as'=>'getPayments']);
	Route::get('expenses', ['uses'=>'ExpenseController@index', 'as'=>'getExpenses']);

	Route::get('client/{id}/report', ['uses'=>'ClientController@showReport', 'as'=>'showClientReport']);
	Route::get('vehicle/{id}/report', ['uses'=>'VehicleController@showReport', 'as'=>'showVehicleReport']);

	Route::get('client/{id}/delete', ['uses'=>'ClientController@destroy', 'as'=>'deleteClient']);
	Route::get('client/{id}/edit', ['uses'=>'ClientController@edit', 'as'=>'getEditClient']);
	Route::get('client/add', ['uses'=>'ClientController@create', 'as'=>'getAddClient']);

	Route::get('payment/{id}/delete', ['uses'=>'PaymentController@destroy', 'as'=>'deletePayment']);
	Route::get('payment/{id}/edit', ['uses'=>'PaymentController@edit', 'as'=>'getEditPayment']);
	Route::get('payment/add', ['uses'=>'PaymentController@create', 'as'=>'getAddPayment']);
	
	Route::get('expense/{id}/delete', ['uses'=>'ExpenseController@destroy', 'as'=>'deleteExpense']);
	Route::get('expense/{id}/edit', ['uses'=>'ExpenseController@edit', 'as'=>'getEditExpense']);
	Route::get('expense/add', ['uses'=>'ExpenseController@create', 'as'=>'getAddExpense']);
	
	Route::get('vehicle/{id}/delete', ['uses'=>'VehicleController@destroy', 'as'=>'deleteVehicle']);
	Route::get('vehicle/{id}/edit', ['uses'=>'VehicleController@edit', 'as'=>'getEditVehicle']);
	Route::get('vehicle/add', ['uses'=>'VehicleController@create', 'as'=>'getAddVehicle']);

	Route::get('transport/{id}/delete', ['uses'=>'TransportController@destroy', 'as'=>'deleteTransport']);
	Route::get('transport/{id}/edit', ['uses'=>'TransportController@edit', 'as'=>'getEdit']);
	Route::get('newTransport', ['uses'=>'TransportController@create', 'as'=>'getAddTransport']);
	Route::get('editTransport/{id}', ['uses'=>'TransportController@edit', 'as'=>'getEditTransport']);


	// LOGOUT
	Route::get('logout', ['uses'=>'UserController@logout', 'as'=>'signout']);

		Route::group(array('before'=>'csrf'), function(){
			Route::post('client/update', ['uses'=>'ClientController@update', 'as'=>'postUpdateClient']);
			Route::post('clients', ['uses'=>'ClientController@store', 'as'=>'postCreateClient']);

			Route::post('payment/update', ['uses'=>'PaymentController@update', 'as'=>'postUpdatePayment']);
			Route::post('payments', ['uses'=>'PaymentController@store', 'as'=>'postCreatePayment']);
			
			Route::post('expense/update', ['uses'=>'ExpenseController@update', 'as'=>'postUpdateExpense']);
			Route::post('expenses', ['uses'=>'ExpenseController@store', 'as'=>'postCreateExpense']);
			

			Route::post('transport/update', ['uses'=>'TransportController@update', 'as'=>'postUpdateTransport']);
			Route::post('transport/create', ['uses'=>'TransportController@store', 'as'=>'postCreateTransport']);

			Route::post('vehicle/update', ['uses'=>'VehicleController@update', 'as'=>'postUpdateVehicle']);
			Route::post('vehicle/create', ['uses'=>'VehicleController@store', 'as'=>'postCreateVehicle']);
		});
});


Route::group(array('before'=>'guest'), function(){

	Route::get('user/create', ['uses'=>'UserController@create', 'as'=>'getCreate']);
	Route::get('user/signin', ['uses'=>'UserController@getSignIn', 'as'=>'getSignIn']);
	
	Route::group(array('before'=>'csrf'), function(){
		Route::post('user/postsignin', ['uses'=>'UserController@signIn', 'as'=>'postsignin']);
		Route::post('user/create', ['uses'=>'UserController@store', 'as'=>'postRegister']);
	});

});

