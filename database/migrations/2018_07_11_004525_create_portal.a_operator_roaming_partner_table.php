<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aOperatorRoamingPartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_operator_roaming_partner', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_operator');
			$table->integer('id_roaming_partner');
			$table->integer('id_opsi_roaming_partner');
			$table->date('launching_date_tsel');
			$table->date('launching_date_rp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_operator_roaming_partner');
	}

}
