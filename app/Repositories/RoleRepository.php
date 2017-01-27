<?php namespace App\Repositories;

use App\Models\Role;

class RoleRepository {

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Role
	 */
	protected $role;

	/**
	 * Create a new RolegRepository instance.
	 *
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	/**
	 * Get all roles.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function all()
	{
		return $this->role->all();
	}

	/**
	 * Update roles.
	 *
	 * @param  array  $inputs
	 * @return void
	 */
	public function update($inputs)
	{
		foreach ($inputs as $key => $value)
		{
			$role = $this->role->where('slug', $key)->firstOrFail();

			$role->title = $value;
			
			$role->save();
		}
	}

	/**
	 * Get roles collection.
	 *
	 * @param  App\Models\User
	 * @return Array
	 */
	public function getAllSelect()
	{
		$select = $this->all()->pluck('title', 'id');

		return compact('select');
	}

	public function getOtherRoles()
	{
		$roles = new Role;
		$select = $roles->where('id','!=',1)->get()->pluck('title', 'id');

		return compact('select');
	}

		public function getOrgRoles()
	{
		$roles = new Role;
		$select_org = $roles->where('id','=',2)->get()->pluck('title', 'id');

		return compact('select_org');
	}

		public function getProgRoles()
	{
		$roles = new Role;
		$select_prog = $roles->where('id','=',3)->get()->pluck('title', 'id');

		return compact('select_prog');
	}

	

}
