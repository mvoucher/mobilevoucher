<?php namespace App\Http\Requests;

class VoucherNoRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'type' => 'required',
			'number' => 'required|numeric|min:1|max:10000'
		];
	}

}