<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CustomersCompanies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('strCustProfComName');
			$table->string('strCustProfComAddress');
			$table->string('strCustProfComDesc');
			$table->string('strCustProfComEmail');
			$table->string('strCustProfComCellNo');
			$table->string('strCustProfComPhoneNo');
			$table->string('strCustProfComFax');
			$table->string('strCustProfComContactPerson');
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
		Schema::drop('CustomersCompanies');
	}

}
