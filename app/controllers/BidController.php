<?php

class BidController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 return View::make('place_bid.bidplace');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		/*$validation=Validator::make(Input::all(),Bid::$rules);


		if($validation->fails())
		{

                return Redirect::back()->withInput()->withErrors($validation->messages());


		}*/



		//return (Input::all());
		
          $auctionid = Input::get('Listingid');
         //return($auctionid);
          $auction_details=Auction::find($auctionid);
           //print_r($auctionid)

          $x=Input::get('bidamount');
	
		


		if($x >= ($auction_details->last_bid_price + $auction_details->selling_price))
		{
   
			$bid = new Bid;
			$bid->bid_amount=$x;
		$bid->user_id=Auth::user()->id;
		$bid->auction_id=$auctionid;
		$bid->auction_name=$auction_details->auction_name;
		
		$bid->save();

		DB::table('auctions_info')
            ->where('id', $auctionid)
            ->update(array('last_bid_price' => $x));
		//$auction_details->min_bid =$bid->bid_amount;


		//$query1=Auction::select('min_bid')->where('id','=',$auctionid)->get();
		//return $query1;


		return Redirect::to('live_auction');
	}
	return Redirect::to('live_auction');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{    
		$auction_details= Auction::find($id);
		if(empty($auction_details))
		{
			echo"Invalid url";
		}
        $y=Auth::user()->id;
		//$query1=Auction::find($id)->bid()->lists('bid_amount');
		$query1=Bid::select('bid_amount')->where('auction_id','=',$id)->where('user_id','=',$y)->get();


		return View::make('bid_auction_show')->with(['auction_details'=> $auction_details,'bidsamount'=>$query1]);
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
