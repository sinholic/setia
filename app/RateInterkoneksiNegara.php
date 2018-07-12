<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RateInterkoneksiNegara extends Model
{
    protected $table = "a_rate_interkoneksi_negara";


    protected $fillable = [
        "id_negara",
        "id_service",
        "id_opsi_unit_service",
        "nilai_unit",
        "nilai_rate",
        "tgl_berlaku",
    ];

}
