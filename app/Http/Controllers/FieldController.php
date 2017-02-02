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

 

class FieldController extends Controller
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
		return view('dashboard.field');
	}

	 public function getFieldms(){
      $all_programmes_mngr = new User;

         $programmes_mngr = $all_programmes_mngr->where('role_id','=',5)->get();
         return view('field.list',compact('programmes_mngr'));
   }

   //organisation that invited the programme
   public function getFieldProg($prog_id){
      $organ = new User;
      $org_name = $organ->where('id','=',$prog_id)->first();
      return $org_name->name;
   }

   //programmes of the logged in organisation
   public function getProgramsField(){

      $field_of_programs = new User;

      $prog_id = auth()->user()->id;
      $program_field = $field_of_programs->where('prog_id','=',$prog_id)->where('role_id','=',5)->get();
   		return view('field.of_programme',compact('program_field'));
   }

   public function create(){
   		return view('field.create');
   }

//invites to dta manager by programme
   public function getFieldInvites(){
      $invites_to_dtm = new Invite;

      $org_id = auth()->user()->id;
      $invite = $invites_to_dtm->where('user_id','=',$org_id)->get();
      return view('field.invite',compact('invite'));
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

      return redirect('field_invites')->with('ok', 'Invite successfull sent.');
   }

   //cancelling an invite to an organisation
      public function destroy(Invite $ivite)
   {
     /* $this->invite_gestion->cancelInvite($invite);
      return redirect('field_invites')->with('ok', 'Invite successfully cancelled');*/
      return redirect('field_invites')->with('error', 'You cannot cancel the request contact Admin');
   }

}
