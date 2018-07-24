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

    public function group_roaming()
    {
        return $this->belongsTo('App\GroupRoamingPartner', 'id_group_roaming_partner');
    }

    public function operators()
    {
        return $this->belongsToMany('App\Operator', 'a_operator_roaming_partner', 'id_operator', 'id_roaming_partner')
            ->withPivot('id_opsi_roaming_partner', 'launching_date_tsel', 'launching_date_rp');
    }
}
