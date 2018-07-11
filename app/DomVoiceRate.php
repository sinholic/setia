<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class DomVoiceRate extends Model
{

    {
        

        protected $table = "a_dom_voice_rate";
        $this->field_desc = "start_date";

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
        $array_float["outgoing_mobile_tj"] = "OUTGOING Mobile TJ";
        $array_float["outgoing_mobile_tl"] = "OUTGOING Mobile TL";
        $array_float["outgoing_fwl_tj"] = "OUTGOING FWL TJ";
        $array_float["outgoing_fwl_tl"] = "OUTGOING FWL TL";
        $array_float["outgoing_fwa_tj"] = "OUTGOING FWA TJ";
        $array_float["outgoing_fwa_tl"] = "OUTGOING FWA TL";
        $array_float["outgoing_sat"] = "OUTGOING SAT";
        $array_float["outgoing_vas_btr"] = "OUTGOING VAS BTR";
        $array_float["outgoing_vas_tlc"] = "OUTGOING VAS TLC";
        $array_float["outgoing_vas_tlh"] = "OUTGOING VAS TLH";
        $array_float["outgoing_tlm"] = "OUTGOING TLM";
        $array_float["outgoing_trh"] = "OUTGOING TRH";
        $array_float["outgoing_call_tls"] = "OUTGOING CALL TLS";
        $array_float["outgoing_telkom_direct"] = "OUTGOING TELKOM DIRECT";
        $array_float["outgoing_telkom_transit"] = "OUTGOING TELKOM TRANSIT";
        $array_float["incoming_mobile_tj"] = "INCOMING MOBILE TJ";
        $array_float["incoming_mobile_tl"] = "INCOMING MOBILE TL";
        $array_float["incoming_sat_tj"] = "INCOMING SAT TJ";
        $array_float["incoming_sat_tl"] = "INCOMING SAT TL";
        $array_float["incoming_telkom_free"] = "INCOMING TLKM FREE";
        $array_float["incoming_jartap_tj"] = "INCOMING JARTAP TJ";
        $array_float["incoming_jartap_tl"] = "INCOMING JARTAP TL";
        $array_float["incoming_telkom_direct"] = "INCOMING TELKOM DIRECT";
        $array_float["incoming_telkom_transit"] = "INCOMING TELKOM TRANSIT";
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
