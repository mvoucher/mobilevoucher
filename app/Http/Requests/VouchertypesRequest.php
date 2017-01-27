<?php namespace App\Http\Requests;

class VouchertypesRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->vouchertype ? ',' . $this->vouchertype : '';
		return [
			'name' => 'required|max:30|unique:vouchertypes,name'.$id,
			'color'=>'required',
			'value' =>'required|numeric|min:2'
		];
	}


}