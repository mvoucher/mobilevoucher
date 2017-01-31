<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role, 
	App\Models\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

//defaults
		Role::create(['title' => 'Administrator','slug' => 'admin']);
		Role::create(['title' => 'Organisation','slug' => 'client']);
		Role::create(['title' => 'Programme','slug' => 'program']);
		Role::create(['title' => 'Programme Overseer','slug' => 'overseer']);
		Role::create(['title' => 'Field Officer','slug' => 'field']);
		Role::create(['title' => 'Team','slug' => 'team']);

		User::create([
			'name'=>'Najja Najibula',
			'telephone'=>'0702794161',
			'country'=>'Uganda',
			'role_id' => 1,
			'photo'=>'default.png',
			'username' => 'Administrator',
			'email' => 'email@innovate.com',
			'password' => bcrypt('admin'),
			'seen' => true,
			'confirmed' => true
		]);

		User::create([
			'name'=>'Mercy Corps',
			'telephone'=>'0752794162',
			'country'=>'Uganda',
			'role_id' => 2,
			'photo'=>'default.png',
			'username' => 'mercycorps',
			'email' => 'email@mercycorps.com',
			'password' => bcrypt('mercy'),
			'seen' => true,
			'confirmed' => true
		]);



		User::create([
			'name'=>'Mastercard Foundation',
			'telephone'=>'0752794163',
			'country'=>'Zambia',
			'role_id' => 3,
			'org_id' => 2,
			'photo'=>'default.png',
			'username' => 'mf',
			'email' => 'email@dynamic.com',
			'password' => bcrypt('dynamic'),
			'seen' => true,
			'confirmed' => true
		]);

		


	}

}
