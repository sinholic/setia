<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SettlementSmsiwInvoice extends Model
{
    protected $table = "a_settlement_smsiwinvoice";

    protected $fillable = [
        "tapcode",
        "periode",
        "nodindate",
        "receivedate",
        "nodinreply",
        "nodinno",
        "checkdate",
        "discrep",
        "exp",
        "notes",
    ];

}