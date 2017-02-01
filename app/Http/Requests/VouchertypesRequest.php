<?php namespace App\Http\Requests;

class VouchertypesRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:2',
			'color'=>'required',
			'value' =>'required|numeric|min:2',
			'category' => 'required'
		];
	}


}