<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class MSC extends Model
{
    protected $table = "a_msc";

    protected $fillable = [
        "kode",
        "nama",
        "notes",
        "nama_kota",
		"recentity",
		"gt",
		"filename",
		"notes",
		"status",
    ];

}
