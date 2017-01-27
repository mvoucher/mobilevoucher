<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model  {

	
	protected $table = 'beneficiarys';

		public function user() 
	{
		return $this->belongsTo('App\Models\User');
	}

}
