<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class DomVoiceRate extends Model
{
    protected $table = "a_dom_voice_rate";


    protected $fillable = [
        "start_date",
        "end_date",
        "outgoing_mobile_tj",
        "outgoing_mobile_tl",
        "outgoing_fwl_tj",
        "outgoing_fwl_tl",
        "outgoing_fwa_tj",
        "outgoing_fwa_tl",
        "outgoing_sat",
        "outgoing_vas_btr",
        "outgoing_vas_tlc",
        "outgoing_vas_tlh",
        "outgoing_tlm",
        "outgoing_trh",
        "outgoing_call_tls",
        "outgoing_telkom_direct",
        "outgoing_telkom_transit",
        "incoming_mobile_tj",
        "incoming_mobile_tl",
        "incoming_sat_tj",
        "incoming_sat_tl",
        "incoming_telkom_free",
        "incoming_jartap_tj",
        "incoming_jartap_tl",
        "incoming_telkom_direct",
        "incoming_telkom_transit",
        "notes",
    ];
}
