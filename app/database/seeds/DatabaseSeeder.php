<?php

class DatabaseSeeder extends Seeder
{

	/**
	 * Tables that are impacted by seeds
	 *
	 * @var array
	 */
	protected $tables = [
		'users',
		'customers',
		'customer_products',
	];

	/**
	 * List of all table seeders
	 *
	 * @var array
	 */
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

	/**
	 * Clean the database and relevant tables
	 */
	public function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		foreach ($this->tables as $table) {
			DB::table($table)->truncate();
		}
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
