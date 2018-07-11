<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Negara extends Model
{
    protected $table = "a_negara";
    protected $fillable = [
        "nama",
        "id_continent",
        "iso3",
        "mcc",
        "notes",
    ];
}