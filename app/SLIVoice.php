<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class SLIVoice extends Model
{

    {
        

        protected $table = "a_sli_voice";
        $this->field_desc = "start_date";

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
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("start_date", "Start Date", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|sometimes|required|date");
        $fields[] = $one;

        $one = new JQFields("end_date", "End Date", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|sometimes|required|date");
        $fields[] = $one;

        $array_float = array();
        $array_float["outgoing_ats"] = "OUTGOING Mobile TJ";
        $array_float["outgoing_bti"] = "OUTGOING Mobile TL";
        $array_float["outgoing_gah"] = "OUTGOING FWL TJ";
        $array_float["outgoing_ins"] = "OUTGOING FWL TL";
        $array_float["outgoing_tlg"] = "OUTGOING FWA TJ";
        $array_float["outgoing_tli"] = "OUTGOING FWA TL";
        $array_float["outgoing_tsv"] = "OUTGOING SAT";
        $array_float["outgoing_mvn"] = "OUTGOING VAS BTR";
        $array_float["incoming_ats"] = "OUTGOING VAS TLC";
        $array_float["incoming_bti"] = "OUTGOING VAS TLH";
        $array_float["incoming_gah"] = "OUTGOING TLM";
        $array_float["incoming_ins"] = "OUTGOING TRH";
        $array_float["incoming_tsp"] = "OUTGOING CALL TLS";
        $array_float["incoming_tlg"] = "OUTGOING TELKOM DIRECT";
        $array_float["incoming_tli"] = "OUTGOING TELKOM TRANSIT";
        $array_float["incoming_tlt"] = "INCOMING MOBILE TJ";
        $array_float["incoming_int"] = "INCOMING MOBILE TL";
        foreach($array_float as $key=>$label) {
            $one = new JQFields($key, $label, JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
            $one->setInputRules("bail|sometimes|required|numeric");
            $one->setListIsVisible(false);
            $fields[] = $one;
        }

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields
    }
}
