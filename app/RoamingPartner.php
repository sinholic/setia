<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class RoamingPartner extends Model
{

    {
        

        protected $table = "a_roaming_partner";
        $this->field_desc = "nama";

        protected $fillable = [
            "nama",
            "id_group_roaming_partner",
            "notes",
        ];
//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.nama");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_group_roaming_partner");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_group_roaming_partner");
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

        $one = new JQFields("id_group_roaming_partner", "Group Roaming Partner", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AGroupRoamingPartner");
        $one->setDisplayFieldToShow("nama_group_roaming_partner");
        $one->setInputRules("bail|sometimes|required");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("bail|sometimes|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

        $this->order_by = "b.id, a.id";
    }
    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->leftJoin("a_group_roaming_partner AS b", "b.id", "=", "a.id_group_roaming_partner");

        return $model;
    }
}
