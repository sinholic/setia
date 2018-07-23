<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class Service extends Model
{
    protected $table = "a_service";

    protected $guarded = [

    ];

    public function rateinterkoneksinegaras()
    {
        return $this->hasMany('App\RateInterkoneksiNegara', 'id_service');
    }
}
