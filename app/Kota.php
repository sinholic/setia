<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Kota extends Model
{
    protected $table = "a_kota";

    protected $guarded = [
    ];

    public function regional()
    {
        return $this->belongsTo('App\Regional', 'id_regional');
    }

    public function msc_a()
    {
        return $this->hasMany('App\MSC', 'id_kota');
    }
}
