<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class MSC extends Model
{
    protected $table = "a_msc";

    protected $guarded = [
    ];

    public function kotas()
    {
        return $this->belongsTo('App\Kota', 'id_kota');
    }
    public function regionals()
    {
        return $this->belongsTo('App\Regional', 'id_regional');
    }
    public function status()
    {
        return $this->belongsTo('App\StatusDataSwitch', 'id_status');
    }
}
