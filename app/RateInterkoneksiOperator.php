<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RateInterkoneksiOperator extends Model
{
    protected $table = "a_rate_interkoneksi_operator";

    protected $fillable = [
        "id_operator",
        "id_service",
        "id_opsi_unit_service",
        "nilai_unit",
        "nilai_rate",
        "tgl_berlaku",
    ];
    
}
