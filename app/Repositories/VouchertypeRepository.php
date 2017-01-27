<?php namespace App\Repositories;

use App\Models\Vouchertype;

class VouchertypeRepository {

	protected $vouchertype;
	
	public function __construct(Vouchertype $vouchertype)
	{
		$this->vouchertype = $vouchertype;
	}

	public function all()
	{
		return $this->vouchertype->all();
	}

	public function count(){
		return $this->vouchertype->count();
	}

	/*public function update($inputs)
	{
	
	}*/

	   public function destroyvouchertype(Vouchertype $vouchertype)
    {

       $vouchertype->delete();
    }

	
	

}
