<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aInterkoneksiCallScenarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_interkoneksi_call_scenario', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_operator_from');
			$table->integer('id_operator_to');
			$table->integer('id_operator_nagih_tagih');
			$table->integer('id_calltype');
			$table->integer('id_intertype');
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
		Schema::drop('portal.a_interkoneksi_call_scenario');
	}

}
