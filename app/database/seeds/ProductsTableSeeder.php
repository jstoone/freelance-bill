<?php

use Faker\Factory as Faker;
use JakobSteinn\Products\Product;
use JakobSteinn\Users\Customer;

class ProductsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		$customers = Customer::lists('id');

		foreach (range(1, 30) as $index) {
			$name = $faker->realText(20);

			Product::create([
				'customer_id'   => $faker->randomElement($customers),
				'name'          => $name,
				'price'         => $faker->numberBetween(100, 5000),
				'description'   => $faker->realText(),
				'password'      => 'secret',
			    'is_paid'       => $faker->boolean(25),
			    'slug'          => $name,
			]);
		}
	}
}
