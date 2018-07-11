<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class DataSwitch extends Model
{
    protected $table = "a_data_switch";


    protected $fillable = [
        "id_msc",
        "recentity",
        "gt",
        "filename",
        "id_status_data_switch",
        "notes",
    ];
    
}
