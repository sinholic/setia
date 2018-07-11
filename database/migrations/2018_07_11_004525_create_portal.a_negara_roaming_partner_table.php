<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aNegaraRoamingPartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_negara_roaming_partner', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_negara');
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
		Schema::drop('portal.a_negara_roaming_partner');
	}

}
