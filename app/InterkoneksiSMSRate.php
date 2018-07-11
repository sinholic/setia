<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class InterkoneksiSMSRate extends Model
{
    
    {
        


        protected $table = "a_interkoneksi_sms_rate";
        $this->field_id = "id";
        $this->field_desc = "id";

        $this->search_fields = [
            "a.start_date",
            "a.end_date",
            "a.incoming",
            "a.outgoing",
        ];

        protected $fillable = [
            "start_date",
            "end_date",
            "incoming",
            "outgoing",
            "notes",
        ];
        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("start_date", "Start Date");
        $one->setInputRules("bail|sometimes|required|date");
        $one->setInputType(JQFIELDS_INPUT_TYPE_DATE);
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

        $one = new JQFields("end_date", "End Date");
        $one->setInputRules("bail|sometimes|required|date");
        $one->setInputType(JQFIELDS_INPUT_TYPE_DATE);
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

        $one = new JQFields("incoming", "Incoming");
        $one->setInputRules("bail|sometimes|required|numeric");
        $one->setInputType(JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $fields[] = $one;
        
        $one = new JQFields("outgoing", "Outgoing");
        $one->setInputRules("bail|sometimes|required|numeric");
        $one->setInputType(JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

    }
}
