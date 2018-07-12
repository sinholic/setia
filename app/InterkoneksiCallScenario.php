<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class InterkoneksiCallScenario extends Model
{
    protected $table = "a_interkoneksi_call_scenario";
    protected $fillable = [
        "id_operator_from",
        "id_operator_to",
        "id_operator_nagih_tagih",
        "id_calltype",
        "id_intertype",
        "notes",
    ];
}
