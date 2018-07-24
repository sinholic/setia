<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarif extends Model
{
    protected $table = "a_telin_tarif";

    protected $guarded = [
    ];

    public function logs()
    {
        return $this->hasMany('App\TelinTarifLog', 'id_telin_tarif');
    }
}
