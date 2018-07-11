<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aMscTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_msc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kota')->nullable();
			$table->string('nama')->nullable();
			$table->string('notes')->nullable();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('kode')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_msc');
	}

}
