<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileImportRequest;

use App\Models\Beneficiary;

use Excel;

class BeneficiaryController extends Controller
{

	public function index(){
		
	}

	 public function getBeneficiaries(){
   		return view('beneficiaries.list');
   }

   public function getProgBeneficiaries(){
   		return view('beneficiaries.of_program');
   }

   public function getOrgBeneficiaries(){
   		return view('beneficiaries.of_organisation');
   }

   public function create(){
   		return view('beneficiaries.create');
   }

   public function getProgBenefImport(){
      return view('beneficiaries.import');
   }


//Suppose you have more than one sheet in a workbook, you will have additional foreach to iterate over sheets as below
/*   Excel::load(Input::file('file'), function ($reader) {

     $reader->each(function($sheet) {    
         foreach ($sheet->toArray() as $row) {
            User::firstOrCreate($row);
         }
     });
});*/

   public function importExcel(
      FileImportRequest $request
      ){
      if($request->hasFile('import_file')){
         $path = $request->file('import_file')->getRealPath();
         $data = Excel::load($path, function($reader) {
         })->get();
         if(!empty($data) && $data->count()){
            foreach ($data as $key => $value) {
               $insert[] = [
               'firstname' => $value->firstname, 
               'lastname' => $value->lastname,
               'gender' => $value->gender,
               'age' => $value->age,
               'district' => $value->district,
               'sub_county' => $value->sub_county,
               'village' => $value->village,
               'no_in_household' => $value->no_in_household,
               'voucher_serial_no' => $value->voucher_serial_no,
               'program_id' => auth()->user()->id,
               'user_id' => auth()->user()->id,
               ];
            }
            if(!empty($insert)){
               $beneficiary = new Beneficiary;
               $beneficiary->insert($insert);
               //dd('Insert Record successfully.');
               return redirect('beneficiary_of_prog')->with('ok','Beneficiary list successfully uploaded');
            }
         }
      }
      return back()->with('error','Beneficiary list not uploaded. There was no file');
   }

 public function exportPDF(){
      $beneficiary = new Beneficiary;
      $data = $beneficiary->get()->toArray();
      return Excel::create('beneficiary_list', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
       {
         $sheet->fromArray($data);
       });
      })->download("pdf");
   }

public function downloadExcel($type){
         $beneficiary = new Beneficiary;
      $data = $beneficiary->get()->toArray();
      return Excel::create('beneficiary_list', function($excel) use ($data) {
         $excel->sheet('mySheet', function($sheet) use ($data)
           {
            $sheet->fromArray($data);
           });
      })->download($type);
   }

}
