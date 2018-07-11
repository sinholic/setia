<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RoamingExchangeRate extends Model
{

    {
        

        protected $table = "t_roaming_exchange_rate";
        $this->field_desc = "kode1";

        protected $fillable = [
            "kode1",
            "kode2",
            "kode3",
            "nilai",
            "ymd",
            "notes",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("kode1", "Kode 1");
        $one->setInputRules("max:50");
        $fields[] = $one;

        $one = new JQFields("kode2", "Kode 2");
        $one->setInputRules("max:50");
        $fields[] = $one;

        $one = new JQFields("kode3", "Kode 3");
        $one->setInputRules("max:50");
        $fields[] = $one;

        $one = new JQFields("nilai", "Rate", JQFIELDS_INPUT_TYPE_NUMBER_DECIMAL);
        $one->setInputRules("bail|sometimes|required|numeric");
        $fields[] = $one;

        $one = new JQFields("ymd", "YMD");
        $one->setInputRules("max:50");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields
    }
}
