<?php

use Faker\Factory as Faker;
use JakobSteinn\Products\Product;

class ProductsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1, 10) as $index) {
			Product::create([
				'name'          => $faker->sentence(3),
				'price'         => $faker->numberBetween(100, 5000),
				'description'   => $faker->paragraph(3),
				'password'      => Hash::make('secret'),
			    'is_paid'       => $faker->boolean(25),
			]);
		}
	}

}
