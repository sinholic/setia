<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RateInterkoneksiOperator extends Model
{
    protected $table = "a_rate_interkoneksi_operator";

    protected $guarded = [
    ];

    public function negara()
    {
        return $this->belongsTo('App\Negara', 'id_negara');
    }

    public function unit_service()
    {
        return $this->belongsTo('App\OpsiUnitService', 'id_opsi_unit_service');
    }

    public function service()
    {
        return $this->belongsTo('App\Service', 'id_service');
    }

}
