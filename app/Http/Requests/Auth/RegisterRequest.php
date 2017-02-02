<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:|max:30',
			'username' => 'required|max:30|alpha|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:8|confirmed',
			'telephone' => 'required|min:10|unique:users',
			'usertype'=> 'required',
			'district'=>'required',
			'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		];
	}

}
