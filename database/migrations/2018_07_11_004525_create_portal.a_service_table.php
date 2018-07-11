<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_service', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama')->unique('a_service_nama_unique');
			$table->string('is_opsi_unit_service', 1)->default('0');
			$table->integer('default_unit')->nullable();
			$table->string('notes')->nullable();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
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
		Schema::drop('portal.a_service');
	}

}
