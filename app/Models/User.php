<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	
	protected $hidden = ['password', 'remember_token'];

	
	public function role() 
	{
		return $this->belongsTo('App\Models\Role');
	}

		public function vouchertypes() 
	{
		return $this->hasMany('App\Models\Vouchertype');
	}



}
