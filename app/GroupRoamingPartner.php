<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class GroupRoamingPartner extends Model
{
    protected $table = "a_group_roaming_partner";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
