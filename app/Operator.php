<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Operator extends Model
{
    protected $table = "a_operator";

    protected $fillable = [
        "nama",
        "kode",
        "parentorg",
        "comments",
        "address",
        "phone",
        "contact_person_nama",
        "contact_person_email",
        "contact_person_phone",
        "register_date",
        "kategori",
        "building",
        "kota",
        "id_tipe_organisasi",
        "id_negara",
        "notes",
		"mnc",
		"network_display",
        "created_by",
        "updated_by"
    ];

    public function groups()
    {
        return $this->belongsToMany('App\GroupOperator', 'a_operator_and_group_operator', 'id_operator', 'id_group_operator')
            ->withPivot('notes', 'created_by', 'updated_by')
            ->withTimestamps();
    }

    public function negara()
    {
        return $this->belongsTo('App\Negara', 'id_continent');
    }

    public function tipe_organisasi()
    {
        return $this->belongsTo('App\TipeOrganisasi', 'id_tipe_organisasi');
    }

    public function rateinterkoneksioperators()
    {
        return $this->hasMany('App\RateInterkoneksiOperator', 'id_operator');
    }

    public function implement()
    {
        return $this->hasMany('App\Implement', 'operator_id');
    }

    public function roamingpartners()
    {
        return $this->belongsToMany('App\RoamingPartner', 'a_operator_roaming_partner', 'id_operator', 'id_roaming_partner')
            ->withPivot('id_opsi_roaming_partner', 'launching_date_tsel', 'launching_date_rp');
    }
}
