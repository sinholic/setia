<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aSliVoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_sli_voice', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->float('outgoing_ats', 10, 0);
			$table->float('outgoing_bti', 10, 0);
			$table->float('outgoing_gah', 10, 0);
			$table->float('outgoing_ins', 10, 0);
			$table->float('outgoing_tlg', 10, 0);
			$table->float('outgoing_tli', 10, 0);
			$table->float('outgoing_tsv', 10, 0);
			$table->float('outgoing_mvn', 10, 0);
			$table->float('incoming_ats', 10, 0);
			$table->float('incoming_bti', 10, 0);
			$table->float('incoming_gah', 10, 0);
			$table->float('incoming_ins', 10, 0);
			$table->float('incoming_tsp', 10, 0);
			$table->float('incoming_tlg', 10, 0);
			$table->float('incoming_tli', 10, 0);
			$table->float('incoming_tlt', 10, 0);
			$table->float('incoming_int', 10, 0);
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
		Schema::drop('portal.a_sli_voice');
	}

}
