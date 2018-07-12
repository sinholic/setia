<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class TipeOrganisasi extends Model
{
    protected $table = "a_tipe_organisasi";

    protected $fillable = [
        "nama",
        "notes",
    ];

}
