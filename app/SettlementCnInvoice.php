<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class SettlementCnInvoice extends Model
{

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
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("tapcode", "Tapcode");
        $fields[] = $one;

        $one = new JQFields("periode", "Periode");
        $fields[] = $one;

        $one = new JQFields("invoicetype", "Type");
        $fields[] = $one;

        $one = new JQFields("processdate", "Process Date", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|date");
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

        $one = new JQFields("nodinreply", "Nodin Reply");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

        $this->search_fields = [
            "tapcode",
            "nodinno"
        ];
    }
}
