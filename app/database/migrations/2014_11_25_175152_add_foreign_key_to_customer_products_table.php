<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToCustomerProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_products', function(Blueprint $table)
		{
			$table->foreign('customer_id')->references('id')->on('customers');
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
			// Drop foreign key 'customer_id' from 'customer_products' table
			$table->dropForeign('customer_products_customer_id_foreign');
		});
	}

}
