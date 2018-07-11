<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aNegaraCountrycodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_negara_countrycode', function(Blueprint $table)
		{
			$table->integer('id_negara')->nullable();
			$table->integer('cc')->nullable();
			$table->string('type')->nullable();
			$table->string('iso3')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_negara_countrycode');
	}

}
