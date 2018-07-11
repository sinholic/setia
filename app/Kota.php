<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Kota extends Model
{
    protected $table = "a_kota";

    protected $fillable = [
        "nama",
        "id_regional",
    ];
}
