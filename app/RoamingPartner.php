<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class RoamingPartner extends Model
{
    protected $table = "a_roaming_partner";


    protected $fillable = [
        "nama",
        "id_group_roaming_partner",
        "notes",
    ];

}
