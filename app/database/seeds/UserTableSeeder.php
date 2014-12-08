<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();

		
			User::create([
				'username'=>'admin',
				'password'=>Hash::make('admin'),
			]);
		
	}

}