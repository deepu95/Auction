<?php

/*use Illuminate\validation\Validator;*/
class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user=Model1::all();
		return View::make('users.index',['user'=> $user]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return View::make('users.create');
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	

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

 public function store()

 {
 	$validation =Validator::make(Input::all(),User::$rules);

 	if($validation->fails())
 	{
 		return Redirect::back()->withInput()->withErrors($validation->messages());
 	}

 	$user1 = new User;
 	$user1->name=Input::get('username');
 	$user1->email=Input::get('email');
 	$user1->gender=Input::get('sex');
 	$user1->password=Hash::make(Input::get('password'));


 	$user1->save();

 	return Redirect::to('login');
 }
}
