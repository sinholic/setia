<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RateInterkoneksiDefault extends Model
{
    protected $table = "a_rate_interkoneksi_default";


    protected $fillable = [
        "id_service",
        "id_opsi_unit_service",
        "nilai_unit",
        "nilai_rate",
        "tgl_berlaku",
    ];

}
