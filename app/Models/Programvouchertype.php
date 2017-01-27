<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programvouchertype extends Model  {

	
	protected $table = 'user_vouchertype';

		public function User() 
	{
		return $this->belongsTo('App\Models\User');
	}

		public function vouchertype() 
	{
		return $this->belongsTo('App\Models\Vouchertype');
	}

}
