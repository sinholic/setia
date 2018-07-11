<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aDomVoiceRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_dom_voice_rate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->float('outgoing_mobile_tj', 10, 0);
			$table->float('outgoing_mobile_tl', 10, 0);
			$table->float('outgoing_fwl_tj', 10, 0);
			$table->float('outgoing_fwl_tl', 10, 0);
			$table->float('outgoing_fwa_tj', 10, 0);
			$table->float('outgoing_fwa_tl', 10, 0);
			$table->float('outgoing_sat', 10, 0);
			$table->float('outgoing_vas_btr', 10, 0);
			$table->float('outgoing_vas_tlc', 10, 0);
			$table->float('outgoing_vas_tlh', 10, 0);
			$table->float('outgoing_tlm', 10, 0);
			$table->float('outgoing_trh', 10, 0);
			$table->float('outgoing_call_tls', 10, 0);
			$table->float('outgoing_telkom_direct', 10, 0);
			$table->float('outgoing_telkom_transit', 10, 0);
			$table->float('incoming_mobile_tj', 10, 0);
			$table->float('incoming_mobile_tl', 10, 0);
			$table->float('incoming_sat_tj', 10, 0);
			$table->float('incoming_sat_tl', 10, 0);
			$table->float('incoming_telkom_free', 10, 0);
			$table->float('incoming_jartap_tj', 10, 0);
			$table->float('incoming_jartap_tl', 10, 0);
			$table->float('incoming_telkom_direct', 10, 0);
			$table->float('incoming_telkom_transit', 10, 0);
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
		Schema::drop('portal.a_dom_voice_rate');
	}

}
