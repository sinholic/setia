<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aRateInterkoneksiOperatorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_rate_interkoneksi_operator', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_operator');
			$table->integer('id_service');
			$table->integer('id_opsi_unit_service')->nullable();
			$table->integer('nilai_unit');
			$table->float('nilai_rate', 10, 0)->nullable();
			$table->date('tgl_berlaku');
			$table->string('notes')->nullable();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('satelite')->nullable()->default('INC');
			$table->string('premium')->nullable()->default('INC');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_rate_interkoneksi_operator');
	}

}
