<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarifLog extends Model
{
    protected $table = "a_telin_tarif_log";

    protected $fillable = [
        "id_telin_tarif",
        "nama",
        "tarif",
        "tarif_previous",
        "tgl_berlaku",
        "notes",
    ];
    
}
