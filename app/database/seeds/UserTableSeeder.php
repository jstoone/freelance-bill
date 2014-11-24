<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => 'jakobsteinn',
			'password' => Hash::make('lege!'),
		]);
	}

}
