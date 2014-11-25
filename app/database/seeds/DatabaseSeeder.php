<?php

class DatabaseSeeder extends Seeder
{

	protected $tables = [
		'users',
		'customers',
		'customer_products',
	];

	protected $seeders = [
		'UsersTableSeeder',
		'CustomersTableSeeder',
		'ProductsTableSeeder',
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();

		foreach($this->seeders as $seeder)
		{
			$this->call($seeder);
		}
	}

	public function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		foreach ($this->tables as $table) {
			DB::table($table)->truncate();
		}
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
