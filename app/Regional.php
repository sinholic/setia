<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class Regional extends Model
{

    protected $table = "a_regional";

    protected $fillable = [
        "kode",
        "nama",
        "notes",
    ];
    
}