<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\InviteRepository;
use App\Http\Requests\InviteRequest;
use App\Models\Invite;

use App\Repositories\UserRepository;
use App\Models\User;

use App\Jobs\SendInvite;

class ClientController extends Controller
{

		protected $invite_gestion;
		protected $user_gestion;

	public function __construct(
		InviteRepository $invite_gestion,
		UserRepository $user_gestion)
	{
		$this->invite_gestion = $invite_gestion;	
		$this->user_gestion = $user_gestion;	
	}
   

	public function index(){
		return view('dashboard.client');
	}

//list of all organisations
		 public function getClients(){
		 	$all_organisations = new User;

		 	$organisations = $all_organisations->where('role_id','=',2)->get();
   		return view('clients.list',compact('organisations'));
   }

//invites sent to organisations by admin
   public function getOrgInvites(){
   	      $invites_to_orgns = new Invite;

      $admin_id = auth()->user()->id;
      $invite = $invites_to_orgns->where('user_id','=',$admin_id)->get();
      return view('clients.invites',compact('invite'));
	}

   public function create(){
   		return view('clients.create');
   }

//cancelling an invite to an organisation
   	public function destroy(Invite $ivite)
	{
		$this->invite_gestion->cancelInvite($invite);
		return redirect('organisation_invites')->with('ok', 'Invite successfully cancelled');
	}

		public function postInvite(
		InviteRequest $request,
		InviteRepository $invite_gestion)
	{

			$invite = $invite_gestion->store(
			$request->all(), 
			$registration_code = str_random(30),
			$invitor = auth()->user()->id
		);

		$this->dispatch(new SendInvite($invite));

		return redirect('organisation_invites')->with('ok', 'Invite successfull sent.');
	}





 
}
