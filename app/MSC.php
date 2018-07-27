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
}
