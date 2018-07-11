<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSettlementTapinvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_settlement_tapinvoice', function(Blueprint $table)
		{
			$table->string('tapcode')->nullable();
			$table->integer('periode')->nullable();
			$table->date('nodindate')->nullable();
			$table->date('receivedate')->nullable();
			$table->string('nodinno')->nullable();
			$table->date('checkdate')->nullable();
			$table->boolean('discrep')->nullable();
			$table->float('sdrdiscrep', 10, 0)->nullable();
			$table->string('exp')->nullable();
			$table->string('nodinreply')->nullable();
			$table->string('notes')->nullable();
			$table->bigInteger('id', true);
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
		Schema::drop('portal.a_settlement_tapinvoice');
	}

}
