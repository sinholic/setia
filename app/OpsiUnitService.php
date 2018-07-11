<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class OpsiUnitService extends Model
{

    {
        

        protected $table = "a_opsi_unit_service";

        protected $fillable = [
            "nama",
            "notes",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
//        $one->setInputRules("bail|required|max:50|is_unique:a_opsi_unit_service,id!={id} and :attribute='{value}' ");
        $one->setInputRules("bail|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields
    }
}
