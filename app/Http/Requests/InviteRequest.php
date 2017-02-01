<?php namespace App\Http\Requests;

class InviteRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:|max:30',
			'email' => 'required|email|max:255|unique:invites'
		];
	}

}
