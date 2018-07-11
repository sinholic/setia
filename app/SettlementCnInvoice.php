<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class SettlementCnInvoice extends Model
{
    protected $table = "a_settlement_cndninvoice";

    protected $fillable = [
        "tapcode",
        "periode",
        "invoicetype",
        "processdate",
        "nodinreply",
        "status",
        "notes",
    ];
    
}
