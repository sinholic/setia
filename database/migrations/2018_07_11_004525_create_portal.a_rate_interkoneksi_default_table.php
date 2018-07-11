<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aRateInterkoneksiDefaultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_rate_interkoneksi_default', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_service')->unique('a_rate_interkoneksi_default_id_service_unique');
			$table->integer('id_opsi_unit_service')->nullable();
			$table->integer('nilai_unit');
			$table->float('nilai_rate', 10, 0);
			$table->date('tgl_berlaku');
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
		Schema::drop('portal.a_rate_interkoneksi_default');
	}

}
