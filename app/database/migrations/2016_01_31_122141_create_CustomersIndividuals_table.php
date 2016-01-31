<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersIndividualsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CustomersIndividuals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('strCustProfIndName');
			$table->string('strCustProfIndAddress');
			$table->string('strCustProfIndEmail');
			$table->string('strCustProfIndCellNo');
			$table->string('strCustProfIndPhoneNo');
			$table->string('strCustProfIndFax');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CustomersIndividuals');
	}

}
