<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarif extends Model
{
    protected $table = "a_telin_tarif";

    protected $fillable = [
        "nama",
        "tarif",
        "tgl_berlaku",
        "notes",
    ];
}
