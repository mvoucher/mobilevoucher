<?php namespace App\Http\Requests;

class ProgramVoucherRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id' => 'required',
			'vouchertype_id' => 'required',
			'org_id' => 'required'
		];
	}

}