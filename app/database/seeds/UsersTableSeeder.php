<?php

use JakobSteinn\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => getenv('ADMIN_USERNAME'),
			'password' => Hash::make(getenv('ADMIN_PASSWORD')),
		]);
	}

}
