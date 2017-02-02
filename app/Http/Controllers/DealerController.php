<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Dealer;

class DealerController extends Controller
{

	public function index(){
		
	}

	 public function getDealers(){
   		return view('dealers.list');
   }

   public function getOrgDealers(){
   		return view('dealers.of_organisation');
   }

   public function getProgDealers(){

      //fetch by program id
      return view('dealers.of_program');
   }

   public function create(){
   		return view('dealers.create');
   }

   public function postDealer(DealerRequest $request){
      $dealer = new Dealer;
      $dealer->firstname = $request->firstname;
      $dealer->lastname = $request->lastname;
      $dealer->gender = $request->gender;
      $dealer->district = $request->district;
      $dealer->sub_county = $request->sub_county;
      $dealer->village = $request->village;
      $dealer->mm_phonenumber = $request->mm_phonenumber;
      $dealer->save();
   }

   public function getProgDealerImport(){
         return view('dealers.import');      
   }

   public function destroy(){
      return redirect()->back()->with('ok','Agro Dealer successfully deleted');
   }
}
