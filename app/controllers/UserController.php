<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(),
			[
				'username' 	=> 'required|min:3|unique:users',
				'password1'	=> 'required|min:6',
				'password2'	=> 'required|same:password1'
			]
			);

		if($validation->passes()){
			//save data to db

			$password = Input::get('password1');

			$user = new User;

			$user->username = Input::get('username');
			$user->password = Hash::make($password);
			$user->remember_token = '';
			$user->active = 0;

			// $user = User::create([
			// 		'username'			=>	Input::get('username'),
			// 		'password'			=> 	Hash::make($password),
			// 		'remember_token'	=> '',
			// 		'active'			=>	0	
			// 	]);

			if($user->save()){
				return Redirect::to('/')
							->with('success','Registered successfully.');
			} else {
				return Redirect::to('/')
							->with('fail','There was an error creating an account. Please try again');
			}
		} else {
			//redirect user back with data and errors
			return Redirect::to('user/create')
						->withErrors($validation)
						->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getSignIn()
	{
		return View::make('admin.user.signin');
	}

	/**
	 * Authenticate a user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function signIn()
	{
		$validation = Validator::make(Input::all(), User::$loginRules);

		if($validation->passes()){

			$remember = (Input::has('remember')) ? true : false;

			if(Auth::attempt(Input::only('username','password'), $remember)){
				return Redirect::intended();
			} else {
				return Redirect::to('user/signin')
							->withInput()
							->with('fail', 'Incorrect username / password');
							
			}
		} else {
			return Redirect::to('user/signin')
							->withInput()
							->withErrors($validation);
		}	
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home')
						->with('success', 'You have been logged out!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
