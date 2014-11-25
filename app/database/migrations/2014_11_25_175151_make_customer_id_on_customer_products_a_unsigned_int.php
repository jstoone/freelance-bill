<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeCustomerIdOnCustomerProductsAUnsignedInt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_products', function(Blueprint $table)
		{
			$table->unsignedInteger('customer_id')->after('id');
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
			$table->dropColumn('customer_id');
		});
	}

}
