<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class InterkoneksiCallScenario extends Model
{

    {
        

        protected $table = "a_interkoneksi_call_scenario";
        $this->field_id = "id";
        $this->field_desc = "nama_operator_from";

        protected $fillable = [
            "id_operator_from",
            "id_operator_to",
            "id_operator_nagih_tagih",
            "id_calltype",
            "id_intertype",
            "notes",
        ];
//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_operator_from");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_operator_to");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_operator_nagih_tagih");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_calltype");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_intertype");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_operator_from");
        $select_fields[] = $one;
        $one = new JQSelect("c.nama", "nama_operator_to");
        $select_fields[] = $one;
        $one = new JQSelect("d.nama", "nama_operator_nagih_tagih");
        $select_fields[] = $one;
        $one = new JQSelect("e.nama", "nama_calltype");
        $select_fields[] = $one;
        $one = new JQSelect("f.nama", "nama_intertype");
        $select_fields[] = $one;
        $one = new JQSelect("a.notes");
        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select_fields

        //region search_fields
        $search_fields = [
            "b.name",
            "c.email",
            "d.nama",
            "e.nama",
            "f.nama",
            "a.notes",
        ];
        $this->search_fields = $search_fields;
        //endregion select_fields

        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("id_operator_from", "Operator From", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AOperator");
        $one->setDisplayFieldToShow("nama_operator_from");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("id_operator_to", "Operator To", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AOperator");
        $one->setDisplayFieldToShow("nama_operator_from");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("id_operator_nagih_tagih", "Operator Nagih Tagih", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AOperator");
        $one->setDisplayFieldToShow("nama_operator_nagih_tagih");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("id_calltype", "Call Type", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("ACalltype");
        $one->setDisplayFieldToShow("nama_calltype");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("id_intertype", "Intertype", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AIntertype");
        $one->setDisplayFieldToShow("nama_intertype");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

    }

    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->join("a_operator AS b", "b.id", "=", "a.id_operator_from");
        $model->join("a_operator AS c", "c.id", "=", "a.id_operator_to");
        $model->join("a_operator AS d", "d.id", "=", "a.id_operator_nagih_tagih");
        $model->join("a_calltype AS e", "e.id", "=", "a.id_calltype");
        $model->join("a_intertype AS f", "f.id", "=", "a.id_intertype");

        return $model;
    }
}
