<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\UserRepository;
use App\Models\User;

use App\Repositories\InviteRepository;
use App\Http\Requests\InviteRequest;
use App\Models\Invite;

use App\Jobs\SendInvite;

use App\Http\Requests;

 

class ProgrammeController extends Controller
{
 
  protected $user_gestion;
  protected $invite_gestion;
 
      public function __construct(
      UserRepository $user_gestion,
      InviteRepository $invite_gestion)
   {
      $this->user_gestion = $user_gestion;
      $this->invite_gestion = $invite_gestion;
   }

	public function index(){
		return view('dashboard.program');
	}

	 public function getPrograms(){
      $all_programmes = new User;

         $programmes = $all_programmes->where('role_id','=',3)->get();
         return view('program.list',compact('programmes'));
   }

   //organisation that invited the programme
   public function getProgOrganisation($org_id){
      $organ = new User;
      $org_name = $organ->where('id','=',$org_id)->first();
      return $org_name->name;
   }

   //programmes of the logged in organisation
   public function getOrgPrograms(){

      $programs_of_org = new User;

      $org_id = auth()->user()->id;
      $program = $programs_of_org->where('org_id','=',$org_id)->get();
   		return view('program.of_organisation',compact('program'));
   }

   public function create(){
   		return view('program.create');
   }

//invites to programmes by organisation
   public function getProgInvites(){
      $invites_to_programs = new Invite;

      $org_id = auth()->user()->id;
      $invite = $invites_to_programs->where('user_id','=',$org_id)->get();
      return view('program.invite',compact('invite'));
   }

   //imnviting a programme
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

      return redirect('program_invites')->with('ok', 'Invite successfull sent.');
   }

   //cancelling an invite to an organisation
      public function destroy(Invite $ivite)
   {
      $this->invite_gestion->cancelInvite($invite);
      return redirect('program_invites')->with('ok', 'Invite successfully cancelled');
   }

}
