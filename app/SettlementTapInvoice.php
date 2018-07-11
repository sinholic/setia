<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SettlementTapInvoice extends Model
{
    protected $table = "a_settlement_tapinvoice";

    protected $fillable = [
        "tapcode",
        "periode",
        "nodindate",
        "receivedate",
        "nodinreply",
        "nodinno",
        "checkdate",
        "discrep",
        "sdrdiscrep",
        "exp",
        "notes",
    ];
}
