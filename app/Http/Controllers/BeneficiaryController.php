<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileImportRequest;
use App\Http\Requests\BeneficiaryRequest;
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

   public function postBenef(BeneficiaryRequest $request){

      if(session('theuser')=='program'){
         $program_id = auth()->user()->id;
         $user_id = auth()->user()->id;
      }
      elseif(session('theuser')=='field'){
         $program_id = auth()->user()->prog_id;
         $user_id = auth()->user()->id;         
      }

      $benefic = new Beneficiary;
      $beneficiary->firstname = $request->firstname;
      $beneficiary->lastname = $request->lastname;
      $beneficiary->gender = $request->gender;
      $beneficiary->district = $request->district;
      $beneficiary->sub_county = $request->sub_county;
      $beneficiary->village = $request->village;
      $beneficiary->no_in_household = $request->no_in_household;
      $beneficiary->voucher_serial_no = $request->voucher_serial_no;
      $beneficiary->program_id = $program_id;
      $beneficiary->user_id = $user_id;
      $beneficiary->save();

      return redirect('beneficiary_of_prog')->with('ok','Beneficiary successfully added');

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

         //who uploaded and where the uploaded belong
      if(session('theuser')=='program'){
         $program_id = auth()->user()->id;
         $user_id = auth()->user()->id;
      }
      elseif(session('theuser')=='field'){
         $program_id = auth()->user()->prog_id;
         $user_id = auth()->user()->id;         
      }

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
               'program_id' => $program_id,
               'user_id' => $user_id,
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
