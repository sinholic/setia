<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SLIVoice extends Model
{
    protected $table = "a_sli_voice";

    protected $fillable = [
        "start_date",
        "end_date",
        "outgoing_ats",
        "outgoing_bti",
        "outgoing_gah",
        "outgoing_ins",
        "outgoing_tlg",
        "outgoing_tli",
        "outgoing_tsv",
        "outgoing_mvn",
        "incoming_ats",
        "incoming_bti",
        "incoming_gah",
        "incoming_ins",
        "incoming_tsp",
        "incoming_tlg",
        "incoming_tli",
        "incoming_tlt",
        "incoming_int",
        "notes",
    ];
}
