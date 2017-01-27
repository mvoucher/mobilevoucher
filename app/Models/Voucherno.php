<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucherno extends Model  {

	
	protected $table = 'vouchernos';

		public function batch() 
	{
		return $this->belongsTo('App\Models\Batch');
	}


}
