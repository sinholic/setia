<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class KotaPOI extends Model
{
    protected $table = "a_kota_poi";

    protected $fillable = [
        "kode",
        "nama",
        "notes",
    ];
}
