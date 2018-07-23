<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class OpsiUnitService extends Model
{
    protected $table = "a_opsi_unit_service";

    protected $guarded = [

    ];

    public function rateinterkoneksinegaras()
    {
        return $this->hasMany('App\RateInterkoneksiNegara', 'id_opsi_unit_service');
    }
}
