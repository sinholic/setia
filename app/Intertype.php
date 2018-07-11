<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class Intertype extends Model
{
    protected $table = "a_intertype";

    protected $fillable = [
        "nama",
        "notes",
    ];
        
}
