<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.xuserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.xuser', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('email')->unique('xuser_email_unique');
			$table->string('password');
			$table->integer('id_group')->default(0);
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('portal.xuser');
	}

}
