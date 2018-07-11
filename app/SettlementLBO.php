<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SettlementLBO extends Model
{

    {
        

        protected $table = "a_settlement_lbo";

        protected $fillable = [
            "service",
            "periode",
            "imsi",
            "idr",
            "sdr",
            "usd",
            "notes",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("service", "Service");
        $fields[] = $one;

	$one = new JQFields("periode", "Periode");
        $fields[] = $one;

        $one = new JQFields("imsi", "IMSI #", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|numeric");
        $fields[] = $one;

        $one = new JQFields("idr", "IDR", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|numeric");
        $fields[] = $one;

        $one = new JQFields("sdr", "SDR", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|numeric");
        $fields[] = $one;

        $one = new JQFields("usd", "USD", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|numeric");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

        $this->search_fields = [
            "service",
            "periode"
        ];
    }
}
