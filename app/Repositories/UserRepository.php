<?php

namespace App\Repositories;

use App\Models\User, App\Models\Role, App\Models\Invite;

class UserRepository extends BaseRepository
{

	protected $role;

	
	public function __construct(
		User $user, 
		Role $role,
		Invite $invite)
	{
		$this->model = $user;
		$this->role = $role;
		$this->invite = $invite;
	}

	public function all()
	{
		return $this->model->all();
	}

	
  	private function save($user, $inputs,$imageName)
	{		
		if(isset($inputs['seen'])) 
		{
			$user->seen = $inputs['seen'] == 'true';		
		} else {

				
			$user->photo = $imageName;
			$user->name = $inputs['name'];
			$user->telephone = $inputs['telephone'];
			$user->district = $inputs['district'];
			$user->role_id = $inputs['usertype'];
			$user->username = $inputs['username'];
			$user->email = $inputs['email'];

			if($inputs['invitor_role']==2){
				$user->org_id = $inputs['invitor_id'];
			}elseif($inputs['invitor_role']==3){
				$user->prog_id = $inputs['invitor_id'];
			}

		}

		$user->save();

		$invites = new Invite;
		$invites->where('registration_code','=',$inputs['reg_code'])->update(array('response' => 1,'registration_code'=>null));

	}

	

	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\User 
	 */
	public function store($inputs, $confirmation_code = null,$imageName)
	{
		$user = new $this->model;

		$user->password = bcrypt($inputs['password']);

		if($confirmation_code) {
			$user->confirmation_code = $confirmation_code;
		} else {
			$user->confirmed = true;
		}

		$this->save($user, $inputs,$imageName);

		return $user;
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs, $user)
	{
		$user->confirmed = isset($inputs['confirmed']);

		$this->save($user, $inputs);
	}

	/**
	 * Get theuser of authenticated user.
	 *
	 * @return string
	 */
	public function getTheuser()
	{
		return session('theuser');
	}

	/**
	 * Valid user.
	 *
     * @param  bool  $valid
     * @param  int   $id
	 * @return void
	 */
	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  App\Models\User $user
	 * @return void
	 */
    public function destroyUser(User $user)
    {
        $user->comments()->delete();

        $posts = $user->posts()->get();

        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }
        
        $user->delete();
    }

	/**
	 * Confirm a user.
	 *
	 * @param  string  $confirmation_code
	 * @return App\Models\User
	 */
	public function confirm($confirmation_code)
	{
		$user = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();

		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->save();
	}

	/**
	 * Get users collection paginate.
	 *
	 * @param  int  $n
	 * @param  string  $role
	 * @return Illuminate\Support\Collection
	 */
	public function index($n, $role)
	{
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})		
			->oldest('seen')
			->latest()
			->paginate($n);			
		}

		return $this->model
		->with('role')		
		->oldest('seen')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})->count();			
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'hadmin' => $this->count('hadmin')
		];

		$countPatients = [
			'pregnant' => $this->count('pregnant'),
			'mother' => $this->count('mother'),
		];

		$countProviders = [
			'officer' => $this->count('officer'),
			'doctors' => $this->count('doctors'),
			'nurse' => $this->count('nurse')
			];

		$counts['total'] = array_sum($counts);
		$counts['patients'] = array_sum($countPatients);
		$counts['providers'] = array_sum($countProviders);

		return $counts;
	}

}
