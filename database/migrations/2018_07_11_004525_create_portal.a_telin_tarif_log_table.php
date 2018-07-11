<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aTelinTarifLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_telin_tarif_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_telin_tarif');
			$table->float('tarif', 10, 0)->default(0);
			$table->float('tarif_previous', 10, 0)->default(0);
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
		Schema::drop('portal.a_telin_tarif_log');
	}

}
