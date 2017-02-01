<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vouchertype extends Model  {

	
	protected $table = 'vouchertypes';

		public function user() 
	{
		return $this->belongsTo('App\Models\User');
	}

			public function batch() 
	{
		return $this->hasMany('App\Models\Batch');
	}

}
