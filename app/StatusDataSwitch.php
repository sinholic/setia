<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class StatusDataSwitch extends Model
{
    protected $table = "a_status_data_switch";

    protected $fillable = [
        "nama",
        "notes",
    ];
    
}
