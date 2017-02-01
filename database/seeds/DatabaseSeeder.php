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


//Admins
		User::create([
			'name'=>'Najja Najibula',
			'telephone'=>'0702794162',
			'country'=>'Uganda',
			'role_id' => 1,
			'photo'=>'default.png',
			'username' => '',
			'email' => 'admin@innovate.com', 
			'password' => bcrypt('admin'),
			'seen' => true,
			'confirmed' => true
		]);

				User::create([
			'name'=>'Mary Musimire',
			'telephone'=>'0750132311',
			'country'=>'Uganda',
			'role_id' => 1,
			'photo'=>'default.png',
			'username' => 'mmusimire',
			'email' => 'sadmin@gmail.com', 
			'password' => bcrypt('admin@!nnovate'),
			'seen' => true,
			'confirmed' => true
		]);

//Team members
		User::create([
			'name'=>'Evelyn Namara',
			'telephone'=>'0771366479',
			'country'=>'Uganda',
			'role_id' => 6,
			'photo'=>'default.png',
			'username' => 'evelyn',
			'email' => 'enamara@uginnovate.com',
			'password' => bcrypt('nevelyn@!nnovate'),
			'seen' => true,
			'confirmed' => true
		]);

				User::create([
			'name'=>'Opio David',
			'telephone'=>'0783689831',
			'country'=>'Uganda',
			'role_id' => 6,
			'photo'=>'default.png',
			'username' => 'Obwangamoi',
			'email' => 'dopio@uginnovate.com',
			'password' => bcrypt('dopio@!nnovate'),
			'seen' => true,
			'confirmed' => true
		]);

//Test accounts

		User::create([
			'name'=>'Test Organisation',
			'telephone'=>'1234567890',
			'country'=>'Uganda',
			'role_id' => 2,
			'photo'=>'default.png',
			'username' => 'testorg',
			'email' => 'email@org.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);



		User::create([
			'name'=>'Test Programme',
			'telephone'=>'0987654321',
			'country'=>'Uganda',
			'role_id' => 3,
			'org_id' => 2,
			'photo'=>'default.png',
			'username' => 'testprog',
			'email' => 'email@program.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);

				User::create([
			'name'=>'Test Field',
			'telephone'=>'5432167890',
			'country'=>'Uganda',
			'role_id' => 3,
			'prog_id' => 2,
			'photo'=>'default.png',
			'username' => 'testfield',
			'email' => 'email@field.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);

		


	}

}
