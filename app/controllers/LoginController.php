<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Redirect::to('/login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()

	{
		if(Auth::check()) return Redirect::to('/home');
		return View::make('login.create2');
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){

	
	 /*$credentials = array(
	 		"name" => Input::get("email"),
	 		"password" => Input::get("password")*/
	 	//);
	// var_dump(Auth::attempt($credentials));die;
		if(Auth::attempt(Input::only('email','password')))
		   {
		   //	return Auth::user()->id;
                // $name= Auth::user()->name;
		   	 return Redirect::to('/home');

		 // return Redirect::to('/Auction_panel/'.Auth::user()->name);
        	  	    // return  $details =Auth::usr();
		   	  	     // return View::make('auction_panel');
                      //return Redirect::to('/home');

                   
		   }
		

		return "failed";
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
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/login');
	}


}
