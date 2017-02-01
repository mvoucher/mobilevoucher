<?php namespace App\Http\Requests;

class FileImportRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'import_file' => 'required|mimes:xls,xlm,xla,xlc,xlt,xlw,xlsx'
		];
	}

}