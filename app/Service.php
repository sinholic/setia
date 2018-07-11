<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class Service extends Model
{

    {
        

        protected $table = "a_service";

        protected $fillable = [
            "nama",
            "is_opsi_unit_service",
            "default_unit",
            "notes",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("bail|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("is_opsi_unit_service", "Use Unit?", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputTextBelowElement("Centang jika menggunakan Unit");
        $fields[] = $one;

        $one = new JQFields("default_unit", "Default Unit", JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $one->setInputRules("bail|sometimes|numeric|nullable");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields
    }
}
