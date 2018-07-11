<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class GroupUserMenuRelation extends Model
{

    {
        

        protected $table = "a_menu_and_group_user";
        $this->field_id = "id";
        $this->field_desc = "namaMenu";

        protected $fillable = [
            "id_menu",
            "id_group_user",
//            "notes",
        ];
        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("id_menu", "Menu", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelMultipleAutoSave(0);
        $one->setInputRelModelName("AMenu");
        $one->setDisplayFieldToShow("namaMenu");
        $fields[] = $one;

        $one = new JQFields("id_group_user", "Group User", JQFIELDS_INPUT_TYPE_SELECT_MULTIPLE);
        $one->setInputRelMultipleAutoSave(0);
        $one->setInputRelModelName("XGroupUser");
        $one->setDisplayFieldToShow("nama_group_user");
        $fields[] = $one;


//        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
//        $one->setInputRules("max:250");
//        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

        //region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;
        $one = new JQSelect("a.id_menu");
        $select_fields[] = $one;
        $one = new JQSelect("a.id_group_user");
        $select_fields[] = $one;
        $one = new JQSelect("b.nama", "namaMenu");
        $select_fields[] = $one;
        $one = new JQSelect("c.nama", "nama_group_user");
        $select_fields[] = $one;
        $this->select_fields = $select_fields;
        //endregion select_fields
    }
    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->join("a_menu AS b", "a.id_menu", "=", "b.id");
        $model->join("xgroup_user AS c", "a.id_group_user", "=", "c.id");

        return $model;
    }
}
