<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class GroupMenu extends Model
{

    {
        

        protected $table = "a_group_menu";

        protected $fillable = [
            "nama",
            "is_show_on_sidebar",
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

        $one = new JQFields("is_show_on_sidebar", "Show On Sidebar", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputTextBelowElement("Centang untuk ditambilkan di Sidebar");
        $fields[] = $one;


        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;


        $this->the_fields = $fields;
        //endregion the fields
    }
}
