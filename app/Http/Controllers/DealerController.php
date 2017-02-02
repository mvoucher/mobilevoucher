<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

   public function getProgDealerImport(){
         return view('dealers.import');      
   }

   public function destroy(){
      return redirect()->back()->with('ok','Agro Dealer successfully deleted');
   }
}