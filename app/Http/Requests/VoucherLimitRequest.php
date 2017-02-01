<?php namespace App\Http\Requests;

class VoucherLimitRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		'min' => 'required',
		'max' => 'required'
		];
	}

}

