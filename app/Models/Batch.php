<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model  {

	
	protected $table = 'batchs';

		public function vouchernos() 
	{
		return $this->hasMany('App\Models\Voucherno');
	}

		public function user() 
	{
		return $this->belongsTo('App\Models\User');
	}

		public function vouchertype() 
	{
		return $this->belongsTo('App\Models\Vouchertype');
	}

}
