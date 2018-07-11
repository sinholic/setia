<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortal.aKotaPoiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('.a_kota_poi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('kode', 10)->unique('a_kota_poi_kode_unique');
			$table->string('nama')->unique('a_kota_poi_nama_unique');
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
		Schema::drop('portal.a_kota_poi');
	}

}
