<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class DataSwitch extends Model
{

    {
        

        protected $table = "a_data_switch";
        $this->field_desc = "nama_msc";

        protected $fillable = [
            "id_msc",
            "recentity",
            "gt",
            "filename",
            "id_status_data_switch",
            "notes",
        ];
        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("id_msc", "MSC", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AMSC");
        $one->setDisplayFieldToShow("nama_msc");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("recentity", "Recentity", JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $one->setInputRules("bail|sometimes|required|numeric");
        $fields[] = $one;

        $one = new JQFields("gt", "GT", JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $fields[] = $one;

        $one = new JQFields("filename", "Filename");
        $one->setInputRules("bail|max:250");
        $fields[] = $one;

        $one = new JQFields("id_status_data_switch", "Status", JQFIELDS_INPUT_TYPE_RADIO);
        $one->setInputRelModelName("AStatusDataSwitch");
        $one->setDisplayFieldToShow("nama_status_data_switch");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields


//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.recentity");
        $select_fields[] = $one;

        $one = new JQSelect("a.gt");
        $select_fields[] = $one;

        $one = new JQSelect("a.filename");
        $select_fields[] = $one;

        $one = new JQSelect("a.notes");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_msc");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_msc");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_status_data_switch");
        $select_fields[] = $one;

        $one = new JQSelect("c.nama", "nama_status_data_switch");
        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select_fields

    }


    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->join("a_msc AS b", "b.id", "=", "a.id_msc");
        $model->leftJoin("a_status_data_switch AS c", "c.id", "=", "a.id_status_data_switch");

        return $model;
    }

}
