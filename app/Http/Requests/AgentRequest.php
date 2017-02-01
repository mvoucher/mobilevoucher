<?php namespace App\Http\Requests;

class AgentRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fistname' => 'required|min:3',
			'lastname' => 'required|min:3',
			'gender' => 'required',
			'district' => 'required',
			'sub_county' => 'required',
			'village' => 'required',
			'mm_phonenumber' => 'required|numeric'
		];
	}

}