<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.tRoamingExchangeRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.t_roaming_exchange_rate', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('kode1')->nullable();
			$table->string('kode2')->nullable();
			$table->string('kode3')->nullable();
			$table->float('nilai', 10, 0)->nullable();
			$table->string('ymd')->nullable();
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
		Schema::drop('portal.t_roaming_exchange_rate');
	}

}
