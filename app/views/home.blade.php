<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Auction</title>
</head>
<body>
    @if(Session::has('message'))
    <p class="{{Session::get('alert-class','alert-info')}}">{{Session::get('message')}}</p>
    @endif
    
    <ul>
        <li>
           {{link_to("/Auction_panel/{id}","Create new Auction") }}
        </li>

        <li>
           {{link_to("/live_auction","Live Auctions") }}
        </li>
            

        <li>
            {{link_to("/logout","Logout") }}
        </li>

       
        
    </body>
    </html>

       

