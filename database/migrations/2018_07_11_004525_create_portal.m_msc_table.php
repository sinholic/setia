<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.mMscTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.m_msc', function(Blueprint $table)
		{
			$table->string('mscid', 20)->nullable();
			$table->string('recentity', 20)->nullable();
			$table->string('gt', 30)->nullable();
			$table->string('mscname', 30)->nullable();
			$table->string('regional', 30)->nullable();
			$table->string('namakota', 30)->nullable();
			$table->string('filename', 30)->nullable();
			$table->string('status', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.m_msc');
	}

}
