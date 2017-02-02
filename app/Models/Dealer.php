<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model  {

	
	protected $table = 'dealers';

		public function user() 
	{
		return $this->belongsTo('App\Models\User');
	}

}
