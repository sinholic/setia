<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aOperatorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_operator', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_negara')->nullable();
			$table->string('nama')->nullable();
			$table->string('kode')->nullable();
			$table->string('mnc')->nullable();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('parentorg', 10)->nullable();
			$table->string('comments', 50)->nullable();
			$table->string('address', 50)->nullable();
			$table->string('phone', 50)->nullable();
			$table->string('contact_person_nama', 50)->nullable();
			$table->string('contact_person_email', 50)->nullable();
			$table->string('contact_person_phone', 50)->nullable();
			$table->date('register_date')->nullable();
			$table->string('kategori', 50)->nullable();
			$table->string('building', 50)->nullable();
			$table->string('kota', 50)->nullable();
			$table->integer('id_tipe_organisasi')->nullable();
			$table->string('notes')->nullable();
			$table->string('network_display')->nullable();
			$table->integer('flagBridge')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_operator');
	}

}
