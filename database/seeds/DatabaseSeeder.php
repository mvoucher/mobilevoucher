<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role, 
	App\Models\User, 
	App\Models\Product;

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
		Role::create(['title' => 'Programme Manager','slug' => 'overseer']);
		Role::create(['title' => 'Field Officer','slug' => 'field']);
		Role::create(['title' => 'Innovate Team','slug' => 'team']);

		Product::create(['name' => 'Maize','slug' => 'maize','category' => 'Cereal']);
		Product::create(['name' => 'Sorghum','slug' => 'sorghum','category' => 'Cereal']);
		Product::create(['name' => 'Millet','slug' => 'millet','category' => 'Cereal']);
		Product::create(['name' => 'Sunflower','slug' => 'sunflower','category' => 'Cereal']);
		Product::create(['name' => 'Oilseeds','slug' => 'oilseeds','category' => 'Cereal']);

		Product::create(['name' => 'Beans','slug' => 'beans','category' => 'Legume']);
		Product::create(['name' => 'Ground nuts','slug' => 'ground_nuts','category' => 'Legume']);
		Product::create(['name' => 'Cow Peas','slug' => 'cow_peas','category' => 'Legume']);
		Product::create(['name' => 'Green Peas','slug' => 'green_peas','category' => 'Legume']);
		Product::create(['name' => 'Soya Beans','slug' => 'soya_beans','category' => 'Legume']);

		Product::create(['name' => 'Carrot','slug' => 'carrot','category' => 'Vegetable']);
		Product::create(['name' => 'Collard Greens','slug' => 'collard_greens','category' => 'Vegetable']);
		Product::create(['name' => 'Egg-Plant','slug' => 'egg_plant','category' => 'Vegetable']);
		Product::create(['name' => 'Green Pepper','slug' => 'green_pepper','category' => 'Vegetable']);
		Product::create(['name' => 'Kale','slug' => 'kale','category' => 'Vegetable']);
		Product::create(['name' => 'Onion','slug' => 'onion','category' => 'Vegetable']);
		Product::create(['name' => 'Spinach','slug' => 'spinach','category' => 'Vegetable']);
		Product::create(['name' => 'Tomatoes','slug' => 'tomatoes','category' => 'Vegetable']);
		Product::create(['name' => 'Watermelon','slug' => 'watermelon','category' => 'Vegetable']);


//Admins
		User::create([
			'name'=>'Najja Najibula',
			'telephone'=>'0702794162',
			'district'=>'Kampala',
			'role_id' => 1,
			'photo'=>'default.png',
			'username' => 'nsnajib',
			'email' => 'admin@innovate.com', 
			'password' => bcrypt('admin'),
			'seen' => true,
			'confirmed' => true
		]);

				User::create([
			'name'=>'Mary Musimire',
			'telephone'=>'0750132311',
			'district'=>'Kampala',
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
			'district'=>'Kampala',
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
			'district'=>'Kampala',
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
			'district'=>'Kampala',
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
			'district'=>'Kampala',
			'role_id' => 3,
			'org_id' => 5,
			'photo'=>'default.png',
			'username' => 'testprog',
			'email' => 'email@program.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);
				User::create([
			'name'=>'Test Programme2',
			'telephone'=>'09876543221',
			'district'=>'Kampala',
			'role_id' => 3,
			'org_id' => 5,
			'photo'=>'default.png',
			'username' => 'testprog2',
			'email' => 'email@program2.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);

				User::create([
			'name'=>'Test Field',
			'telephone'=>'5432167890',
			'district'=>'Kampala',
			'role_id' => 5,
			'prog_id' => 6,
			'photo'=>'default.png',
			'username' => 'testfield',
			'email' => 'email@field.com',
			'password' => bcrypt('test'),
			'seen' => true,
			'confirmed' => true
		]);

		


	}

}
