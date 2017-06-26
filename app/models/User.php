<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps= true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userinfo';

	protected $fillable = array('name', 'password');

	public static $rules=[

	'username'=>'required',
	'password'=>'required',
    'email'=>'required|email|unique:users'
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
