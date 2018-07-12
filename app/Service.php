<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class Service extends Model
{
    protected $table = "a_service";

    protected $fillable = [
        "nama",
        "is_opsi_unit_service",
        "default_unit",
        "notes",
    ];
    
}
