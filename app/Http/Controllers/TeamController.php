<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TeamController extends Controller
{

	public function index(){
		 return view('dashboard.team');
	}

   public function create(){
   		return view('dealers.create');
   }

   public function destroy(){
      return redirect()->back()->with('ok','');
   }
}
