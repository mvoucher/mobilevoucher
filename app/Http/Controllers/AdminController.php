<?php namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller {

	protected $user_gestion;

	protected $role_gestion;

	public function __construct(
		UserRepository $user_gestion,
		RoleRepository $role_gestion)
	{
		$this->user_gestion = $user_gestion;
		$this->role_gestion = $role_gestion;;		
	}
   
  
	public function index()
	{	
		return view('dashboard.admin');
	}

public function edit(User $user)
	{
		return view('profile.password');	
}

}
