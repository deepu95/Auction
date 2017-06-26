<?php

class AuctionController extends \BaseController {

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
	public function listing()

	{  

		 $listings=Auction::all();
	   	return View::make('auction_live')->with('listings',$listings);
	}

	public function create()
	{
           return View::make('home');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
{



	//return  "hello";
	// {
		$validation=Validator::make(Input::all(),Auction::$rules);


		if($validation->fails())
		{

                return Redirect::back()->withInput()->withErrors($validation->messages());


		}

		
         $curr_time=Carbon\Carbon::now();
         $curr_time->addHours(5);
         $curr_time->addMinutes(32);
           $curr_time1= $curr_time->toTimeString();

         $cdate=date('Y-m-d');

         /*$curr_date=Carbon\Carbon::now();
         $curr_date1=$curr_date->toString();
         //echo $curr_date1;*/

        // $curr_time->subHours()
         //$curr_time->toDateTimeString();
         $start_time=Input::get('start_time');
         $start_date=Input::get('start_date');
         $end_time=Input::get('end_time');
         $end_date=Input::get('end_date');
         //$curr_time->format('h:i:s');
        /* $start_time1=Carbon\Carbon::parse($start_time);
         $end_time1=Carbon\Carbon::parse($end_time);
          $start_date1=Carbon\Carbon::parse($start_date);
           $end_date1=Carbon\Carbon::parse($end_date);
*/

         /*$length = $start_time1->diffInMinutes($curr_time);
          $length2= $start_time1->diffInHours($curr_time);
           $length3 = $start_time1->diffInDays($curr_time);
         */

   

   if($start_date < $cdate)
   {
         
         return Redirect::back()->withInput()->with('message','Sorry start time should be greater than current time');
     }

     else{
       
         //return $start_time1 . $curr_time;
          if($start_time<$curr_time1 && $start_date == $cdate )
         {
              //$length=0;
         	return Redirect::back()->withInput()->with('message','Sorry start time should be greater than current time');
         }
        
         
}
         //return $length;

   if($start_date > $end_date)
   {
         
         return Redirect::back()->withInput()->with('message','Sorry start time should be less than current time');
     }

//    
         if($start_time>$end_time && $start_time == $end_time )
         {
              //$length=0;
         	return Redirect::back()->withInput()->with('message','Sorry start time should be less than end time');
         } 

        
       
		$entry = new Auction;


		$entry->auction_name=Input::get('auction_name');
		$entry->min_bid=Input::get('min_bid');
		$entry->reserved_price=Input::get('reserved_price');
		$entry->selling_price=Input::get('selling_price');
		$entry->last_bid_price=Input::get('min_bid') ;
		$entry->start_date=Input::get('start_date');
		$entry->end_date=Input::get('end_date');
		$entry->start_time=Input::get('start_time');
		$entry->end_time=Input::get('end_time');
		$entry->status=Input::get('status');
        $entry->user_id=Auth::user()->email;
        $entry->save();

        return Redirect::to('/home')->with('message','Auction created Successfully');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//echo $id;
		if(Auth::check())
		{
			return View::make('auctionpanel');
		}
		return Redirect::to('/login');
		//return View::make('auctionpanel');
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
