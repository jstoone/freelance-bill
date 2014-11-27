<?php namespace JakobSteinn\Users;

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	/**
	 * Specify which files are fillable, and protect against Mass Assignment
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'password'];
}
