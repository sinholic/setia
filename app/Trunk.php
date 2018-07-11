<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\JQSelect;

Class Trunk extends Model
{
    protected $table = "a_trunk";
    $this->field_desc = "nama_msc";

    protected $fillable = [
        "id_msc",
        "id_operator",
        "id_kota_poi",
        "reg",
        "id_tipe_trunk",
        "tdm_sip",
        "start_date",
        "end_date",
        "notes",
    ];
    $this->timestamps = true;
}
