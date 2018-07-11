<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aInterkoneksiSmsRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_interkoneksi_sms_rate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('start_date');
			$table->date('end_date');
			$table->float('incoming', 10, 0);
			$table->float('outgoing', 10, 0);
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('notes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_interkoneksi_sms_rate');
	}

}
