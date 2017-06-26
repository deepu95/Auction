<!DOCTYPE html>
<html>
<head>
	<title>Auction Information</title>
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
	<!--  -->
	<!-- <script type="text/javascript">
		$(document).ready(function()
			{
				$('#view').click( function()
					//{ $('#view').css('background-color','red');
				});
			});
	</script> -->
	
</head>

<body>
	<h1>Auction_Info</h1>
	<table id="t02" >
	<tr>
		
		<th>Auction Name</th>
		<th>Status</th>
		<th>Ends At</th>
		<th>Minimum Increasing Amount</th>
		<th>Current Price</th>
		<th> Earlier Bids Amount</th>


	</tr>

	
	<tr>
	   
		<td>{{$auction_details->auction_name}}</td>	
		<td>{{$auction_details->status}}</td>
		<td>{{$auction_details->end_time}}</td>
		<td>{{$auction_details->selling_price}}</td>

		<td>{{$auction_details->last_bid_price}}</td>

       <td>
       	       @foreach($bidsamount as $bidamount)
       	      {{$bidamount->bid_amount}}
       	         @endforeach
       </td>

		
	</tr>	





</body>
</html>