<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSettlementLboTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_settlement_lbo', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('service')->nullable();
			$table->integer('periode')->nullable();
			$table->integer('imsi')->nullable();
			$table->integer('idr')->nullable();
			$table->integer('sdr')->nullable();
			$table->integer('usd')->nullable();
			$table->string('notes')->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_settlement_lbo');
	}

}
