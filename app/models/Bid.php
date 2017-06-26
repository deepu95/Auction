<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Bid extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps= true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bidsinfo';

	//protected $fillable = array('name', 'password');

	public static $rules=[

	
	'bidamount'=>'required',
	
    
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function  auction()
	{
		return $this->belongsToMany('Auction');
	}

}
