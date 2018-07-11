<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RoamingExchangeRate extends Model
{
    protected $table = "t_roaming_exchange_rate";

    protected $fillable = [
        "kode1",
        "kode2",
        "kode3",
        "nilai",
        "ymd",
        "notes",
    ];
}
