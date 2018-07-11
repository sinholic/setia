<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSettlementCndninvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_settlement_cndninvoice', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('tapcode')->nullable();
			$table->string('invoicetype')->nullable();
			$table->integer('periode')->nullable();
			$table->date('processdate')->nullable();
			$table->string('status')->nullable();
			$table->string('nodinreply')->nullable();
			$table->string('notes')->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->bigInteger('sdr')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_settlement_cndninvoice');
	}

}
