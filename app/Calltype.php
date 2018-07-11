<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class Calltype extends Model
{
    protected $table = "a_calltype";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
