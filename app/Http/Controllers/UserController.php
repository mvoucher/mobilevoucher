<?php namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	protected $user_gestion;

	protected $role_gestion;

	public function __construct(
		UserRepository $user_gestion,
		RoleRepository $role_gestion)
	{
		$this->user_gestion = $user_gestion;
		$this->role_gestion = $role_gestion;

		$this->middleware('admin');
		$this->middleware('ajax', ['only' => 'updateSeen']);
	}

	public function index()
	{
		$users = $this->user_gestion->all();
		return view('users.list', compact('users'));
	}


public function getTrail(){
	return view('users.trail');
	}

	public function getProfile(){
		return view('profile.my_profile');
	}

	/*public function create()
	{
		return view('users.create', $this->role_gestion->getAllSelect());
	}

	public function store(
		UserCreateRequest $request)
	{
		$this->user_gestion->store($request->all());

		return redirect('user')->with('ok', trans('back/users.created'));
	}

	public function show(User $user)
	{
		return view('back.admin.users.show',  compact('user'));
	}

	public function edit(User $user)
	{
		return view('back.admin.users.edit', array_merge(compact('user'), $this->role_gestion->getAllSelect()));
	}
*/

	public function update(
		UserUpdateRequest $request,
		User $user)
	{
		$this->user_gestion->update($request->all(), $user);

		return redirect('user')->with('ok', trans('back/users.updated'));
	}

	public function updateSeen(
		Request $request,
		User $user)
	{
		$this->user_gestion->update($request->all(), $user);
		return response()->json();
	}

	public function destroy(User $user)
	{
		$this->user_gestion->destroyUser($user);
		return redirect('user')->with('ok', trans('back/users.destroyed'));
	}

	public function getRoles()
	{
		$roles = $this->role_gestion->all();
		return view('back.admin.users.roles', compact('roles'));
	}

	public function postRoles(RoleRequest $request)
	{
		$this->role_gestion->update($request->except('_token'));
		return redirect('user/roles')->with('ok', trans('back/roles.ok'));
	}

	public function changePassword(Request $request)
    {   
            $this->validate($request, [
                    'password' => 'required|min:8|confirmed',
            ]);
            $credentials = $request->only(
                   'password', 'password_confirmation'
            );

            $user = auth()->user();
            $user->password = bcrypt($credentials['password']);
            $user->save();
            return redirect('my_profile')->with('ok','Password successfully changed');
    }

    public function myProfile(){
    	$user = new User;
    	$id = auth()->user()->id;
		$profile = $user->where('id','=',$id)->first();

		if(session('theuser')=='admin'){
			return view('back.global.profile.admin_view',compact('profile'));	
		}

	
    }



}
