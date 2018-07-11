<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('link_label')->unique('a_menu_link_label_unique');
			$table->string('link_url');
			$table->string('link_desc')->nullable();
			$table->string('is_frame', 1)->default('0');
			$table->string('is_public', 1)->default('0');
			$table->string('is_show_on_sidebar', 1)->default('0');
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->integer('id_group_menu')->nullable();
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
		Schema::drop('portal.a_menu');
	}

}
