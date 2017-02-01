<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AgentController extends Controller
{

	public function index(){
		
	}

	 public function getAgents(){
   		return view('agents.list');
   }

   public function getOrgAgents(){
   		return view('agents.of_organisation');
   }

   public function getProgAgents(){
      return view('agents.of_program');
   }

   public function create(){
   		return view('agents.create');
   }

      public function getProgAgentImport(){
      return view('agents.import');
   }
}
