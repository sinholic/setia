<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.tTapSummaryPerImsiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.t_tap_summary_per_imsi', function(Blueprint $table)
		{
			$table->string('visitmanager', 50)->nullable();
			$table->text('servicegroup')->nullable();
			$table->text('servicegroupdetail')->nullable();
			$table->string('imsi', 20)->nullable();
			$table->dateTime('gmtstarttime')->nullable();
			$table->bigInteger('servicevalue')->nullable();
			$table->index(['visitmanager','imsi','gmtstarttime'], 't_tap_summary_per_imsi_visitmanager_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.t_tap_summary_per_imsi');
	}

}
