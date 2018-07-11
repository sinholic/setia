<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Kota extends Model
{

    {
        

        protected $table = "a_kota";
        $this->field_desc = "nama";

        protected $fillable = [
            "nama",
            "id_regional",
        ];
//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.nama");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_regional");
        $select_fields[] = $one;

        $one = new JQSelect("a.notes");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_regional");
        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select_fields

        //region search_fields
        $search_fields = [
            "a.nama",
            "b.nama",
        ];
        $this->search_fields = $search_fields;
        //endregion select_fields

        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("bail|sometimes|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("id_regional", "Regional", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("ARegional");
        $one->setDisplayFieldToShow("nama_regional");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

//
//        $one = new JQFields("_RoamingPartner", "Roaming Partner", JQFIELDS_INPUT_TYPE_CHECK_MULTIPLE);
//        $one->setListIsVisible(false);
//        $one->setInputIsGenerateInput(false);
//        $one->setInputRelMultipleFunctionToGetData("get_roaming_partner_by_id");
//        $fields[] = $one;


        $this->the_fields = $fields;
        //endregion the fields

    }
    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->leftJoin("a_regional AS b", "b.id", "=", "a.id_regional");

        return $model;
    }
}
