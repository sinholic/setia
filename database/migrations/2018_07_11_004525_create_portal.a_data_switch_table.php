<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aDataSwitchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_data_switch', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_msc');
			$table->integer('recentity');
			$table->integer('gt')->nullable();
			$table->string('filename')->nullable();
			$table->integer('id_status_data_switch')->default(0);
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
		Schema::drop('portal.a_data_switch');
	}

}
