<?php

use JakobSteinn\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => 'jakobsteinn',
			'password' => Hash::make('lege!'),
		]);
	}

}
