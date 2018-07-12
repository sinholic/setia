<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class TipeTrunk extends Model
{
    protected $table = "a_tipe_trunk";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
