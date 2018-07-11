<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.xgroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.xgroup_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama')->unique('xgroup_user_nama_unique');
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('is_suspended', 1)->default('0');
			$table->string('notes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.xgroup_user');
	}

}
