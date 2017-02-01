<?php

namespace App\Repositories;

use App\Models\Invite;

class InviteRepository extends BaseRepository
{

	protected $invite;

	
	public function __construct(
		Invite $invite)
	{
		$this->model = $invite;
	}

	public function all()
	{
		return $this->model->all();
	}

	
  	private function save($invite, $inputs, $invitor)
	{			
			$invite->name = $inputs['name'];
			$invite->email = $inputs['email'];
			$invite->role_id =$inputs['role_id'];
			$invite->user_id = $invitor;
			$invite->save();
	}


	public function store($inputs, $registration_code = null,$invitor)
	{
		$invite = new $this->model;

		if($registration_code) {
			$invite->registration_code = $registration_code;
		} else {
			$invite->confirmed = true;
		}

		$this->save($invite, $inputs,$invitor);

		return $invite;
	}

	 public function cancelInvite(Invite $invite)
    {
       // $invite->registration_code = 0;        
        //$user->save();
    }

}
