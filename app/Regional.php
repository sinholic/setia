<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class Regional extends Model
{

    protected $table = "a_regional";

    protected $fillable = [
        "kode",
        "nama",
        "notes",
    ];
    public function kotas()
    {
        return $this->hasMany('App\Kota', 'id_regional');
    }
    public function msc_data()
    {
        return $this->hasMany('App\MSC', 'id_regional');
    }
}
