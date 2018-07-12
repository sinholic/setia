<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class OpsiRoamingPartner extends Model
{
    protected $table = "a_opsi_roaming_partner";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
