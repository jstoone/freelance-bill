<?php
use Faker\Factory as Faker;
use JakobSteinn\Users\Customer;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 25) as $index)
		{
			Customer::create([
				'name' => $faker->name,
				'email' => $faker->email
			]);
		}
	}

}
