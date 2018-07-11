<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSettlementSmsiwinvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_settlement_smsiwinvoice', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('tapcode')->nullable();
			$table->integer('periode')->nullable();
			$table->date('nodindate')->nullable();
			$table->date('receivedate')->nullable();
			$table->string('nodinno')->nullable();
			$table->boolean('discrep');
			$table->string('exp')->nullable();
			$table->string('nodinreply')->nullable();
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
		Schema::drop('portal.a_settlement_smsiwinvoice');
	}

}
