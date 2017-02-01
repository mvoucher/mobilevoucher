<?php namespace App\Services;

class Theuser  {

	/**
	 * Set the login user theuser
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function setLoginTheuser($login)
	{
		session()->put('theuser', $login->user->role->slug);
	}

	/**
	 * Set the visitor user theuser
	 * 
	 * @return void
	 */
	public function setVisitorTheuser()
	{
		session()->put('theuser', 'visitor');
	}

	/**
	 * Set the theuser
	 * 
	 * @return void
	 */
	public function setTheuser()
	{
		if(!session()->has('theuser')) 
		{
			session()->put('theuser', auth()->check() ?  auth()->user()->role->slug : 'visitor');
		}
	}

}