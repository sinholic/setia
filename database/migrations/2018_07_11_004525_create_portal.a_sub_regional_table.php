<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSubRegionalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_sub_regional', function(Blueprint $table)
		{
			$table->integer('id')->primary('a_sub_regional_pkey');
			$table->integer('id_region');
			$table->string('nama');
			$table->string('notes')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by');
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
		Schema::drop('portal.a_sub_regional');
	}

}
