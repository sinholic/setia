<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aNegaraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_negara', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_continent');
			$table->string('nama');
			$table->string('kode')->nullable()->unique('a_negara_kode_unique');
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->timestamps();
			$table->string('iso3')->nullable();
			$table->string('mcc')->nullable();
			$table->string('notes')->nullable();
			$table->integer('cc')->nullable();
			$table->string('iso_currency', 5)->nullable();
			$table->string('currency_name')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portal.a_negara');
	}

}
