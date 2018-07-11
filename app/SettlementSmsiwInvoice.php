<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SettlementSmsiwInvoice extends Model
{

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
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("tapcode", "Tapcode");
        $fields[] = $one;

        $one = new JQFields("periode", "Periode");
        $fields[] = $one;

        $one = new JQFields("nodinno", "Nodin Req");
        $fields[] = $one;

        $one = new JQFields("nodindate", "Nodin Date", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|date");
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

	$one = new JQFields("receivedate", "Receive Date", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|date");
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

        $one = new JQFields("discrep", "Discrep");
        $fields[] = $one;

        $one = new JQFields("exp", "EXP");
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
