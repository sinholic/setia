<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class InterkoneksiSMSRate extends Model
{
    protected $table = "a_interkoneksi_sms_rate";
    protected $fillable = [
        "start_date",
        "end_date",
        "incoming",
        "outgoing",
        "notes",
    ];
}
