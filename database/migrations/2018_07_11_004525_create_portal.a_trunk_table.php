<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aTrunkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_trunk', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_msc');
			$table->integer('id_operator');
			$table->integer('id_kota_poi');
			$table->string('reg')->nullable();
			$table->integer('id_tipe_trunk');
			$table->string('tdm_sip')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
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
		Schema::drop('portal.a_trunk');
	}

}
