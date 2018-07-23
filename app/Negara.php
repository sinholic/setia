<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Negara extends Model
{
    protected $table = "a_negara";
    protected $guarded = [
    ];

    public function continent()
    {
        return $this->belongsTo('App\Continent', 'id_continent');
    }

    public function rateinterkoneksinegaras()
    {
        return $this->hasMany('App\RateInterkoneksiNegara', 'id_negara');
    }
}
