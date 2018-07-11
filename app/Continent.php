<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class Continent extends Model
{

    {
        

        protected $table = "a_continent";
        $this->field_desc = "nama";

        protected $fillable = [
            "nama",
            "notes"
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setInputRules("max:250");
        $one->setListIsVisible(false);
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields
    }
}
