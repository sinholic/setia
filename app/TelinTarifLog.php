<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarifLog extends Model
{
    protected $table = "a_telin_tarif_log";

    protected $guarded = [
    ];

    public function tarif()
    {
        return $this->belongsTo('App\TelinTarif', 'id_telin_tarif');
    }

}
