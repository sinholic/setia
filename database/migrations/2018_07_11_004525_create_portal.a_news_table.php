<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_news', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 250);
			$table->text('slug')->default('');
			$table->text('konten');
			$table->string('is_publish', 1)->default('');
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
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
		Schema::drop('portal.a_news');
	}

}
