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

Route:: get('/login','LoginController@create');
Route::post('/login', 'LoginController@store');
Route:: get('/logout','LoginController@destroy');
Route:: get('/users/create', 'UserController@create');
Route:: post('/users/create', 'UserController@store');
Route::get('/home','AuctionController@create')->before('auth');
Route::get('/Auction_panel/{id}','AuctionController@show');
Route::post('/Auction_panel','AuctionController@store');
Route::get('/live_auction','AuctionController@listing');
Route::get('/bidder_auction/{id}','BidController@show');
//Route::resource('bid','BidController');
Route::post('/bidplaced','BidController@store');

//Route::post('/placebid','BidController@create');
/*Route::post('/popup',function()
 {
     return  "wassup";
 });*/

// Route :: get('test',function()
// {
//    echo '<form action="test" method ="POST">';
//    echo '<input type= "submit" value="submit">';
//  echo'</form>';
         
// });

?>