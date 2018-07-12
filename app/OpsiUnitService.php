<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class OpsiUnitService extends Model
{
    protected $table = "a_opsi_unit_service";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
