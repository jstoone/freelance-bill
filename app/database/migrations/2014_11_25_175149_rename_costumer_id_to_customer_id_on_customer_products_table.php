<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RenameCostumerIdToCustomerIdOnCustomerProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_products', function(Blueprint $table)
		{
			$table->renameColumn('costumer_id', 'customer_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer_products', function(Blueprint $table)
		{
			$table->renameColumn('customer_id', 'costumer_id');
		});
	}

}
