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
        "_GroupOperator",
		"mnc",
		"network_display",
    ];

}
