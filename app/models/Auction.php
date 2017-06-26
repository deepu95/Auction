<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Auction extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps= true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auctions_info';

	protected $fillable = array('name', 'password');

	public static $rules=[

	'auction_name'=>'required',
	'min_bid'=>'required',
	'reserved_price'=>'required',
	'selling_price'=>'required',
	'start_time'=>'required',
	'end_time'=>'required',
	'status'=>'required',
    
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function  bid()
	{
		return $this->belongsToMany('Bid');
	}

}
