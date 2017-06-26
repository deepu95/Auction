<!DOCTYPE html>
<html>
<head>
	<title>Live Auctions</title>
	<link href="/css/elements.css" rel="stylesheet">
<script src="/js/my_js.js"></script>

	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


	<style>	
	 table#t01 tr:nth-child(even) {
	    background-color: #eee;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#faa;
	}
	table#t01 th {
	    background-color: black;
	    color: white;
	} 
	td,th,tr
	{
		padding:10px;
	}
	</style>
	
</head>

<body style="overflow:hidden;">
	<h1>Live Auctions</h1>
	<table id="t01" >
	<tr>
		<th>Auction Name</th>
		<th>Status</th>
		<th>Ends At</th>
		<th>Current Price</th>
		<th>View</th>
		<th>Pop Up</th>
		

	</tr>

	@foreach($listings as $listing)
	@if(Auth::user()->email !== $listing->user_id)
	<tr>
		<td>{{$listing->auction_name}}</td>	
		<td>{{$listing->status}}</td>
		<td>{{$listing->end_time}}</td>
		<td>{{$listing->last_bid_price}}</td>

		
		<td><a href="bidder_auction/{{$listing->id}}">View</a></td>
		 
        	
          <td>    <button id="popup" onclick="div_show({{$listing->id}})">Pop up</button>
              <!-- <input type="submit" class = "btn btn-primary"  value ="Place Bid"> -->
              
		</td>
	</tr>	
	@endif
	 @endforeach



	<p>
	 <a href="create_auction">Create new Auction</a> 
	</p>

<div id="abc">
<!-- Popup Div Starts Here -->
	<div id="popupContact">
	<!-- Contact Us Form -->
		<form action="/bidplaced" id="form" method="post" name="form">
		<img id="close" src="images/3.png" onclick ="div_hide()">
		<h3>Place Your Bid</h3>
		 <input name="Listingid" id ="Listing_id" type="hidden" value="empty">
		 <!-- {{Form::label('bidamount','Your Bid Price: ')}}
            {{Form::text('bidamount')}}
            {{$errors->first('bidamount')}} -->
         <input id="bidamount" name="bidamount" placeholder="Your Bid Price" type="text">
          <input type="submit" name="submit" value="go">
		
	
		</form>
	</div>
<!-- Popup Div Ends Here -->
</div>



</body>
</html><!--  -->