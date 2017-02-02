<?php namespace App\Http\Requests;

class BeneficiaryRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			/*'fistname' => 'required|min:3',
			'lastname' => 'required|min:3',
			'gender' => 'required',
			'age' => 'required|numeric',
			'district' => 'required',
			'sub_county' => 'required',
			'village' => 'required',
			'no_in_household' => 'required|numeric',
			'voucher_serial_no' => 'required',*/
		];
	}

}