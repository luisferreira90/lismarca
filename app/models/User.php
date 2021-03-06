<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use RemindableTrait;
	protected $fillable = ['name','email','phone','address','location','entity_type','company_name','password','newsletter','confirmation_code'];

	/**
     * Find out if User is an admin
     *
     * @return boolean
     */
    public static function isAdmin()
    {
    	return Auth::user()->is_admin;
    }


    /**
     * Return user list
     *
     * @return array
     */
    public function listAll($filter)
    {
    	$users = $this->select('id', 'name', 'email', 'phone', 'location', 'entity_type', 'company_name')->where('is_admin', '0');
    	if(Input::get('entity_type')) 
    		$users = $users->where('entity_type', '=', $filter['entity_type']);
    	if(Input::get('location')) 
    		$users = $users->where('location', '=', $filter['location']);
    	return $users->get();
    }


    public function newsletterUsers() {
    	$users = $this->select('name', 'email','newsletter')->where('newsletter', '=', '1')->get();
    	return $users;
    }


    /**
     * Return Entity Type list
     *
     * @return string
     */
 	public function entityType()
    {
        return $this->belongsTo('EntityType');
    }
    
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	    return $this->email;
	}

	public function getRememberToken()
	{
    	return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

}