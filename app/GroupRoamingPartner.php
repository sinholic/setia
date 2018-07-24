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

    public function roamingpartners()
    {
        return $this->hasMany('App\RoamingPartner', 'id_group_roaming_partner');
    }
}
