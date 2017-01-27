<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loggedin extends Model  {

	
	protected $table = 'loggedins';

		public function user() 
	{
		return $this->belongsTo('App\Models\User');
	}

}
