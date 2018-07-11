<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarif extends Model
{

    {
        

        protected $table = "a_telin_tarif";

        protected $fillable = [
            "nama",
            "tarif",
            "tgl_berlaku",
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

        $one = new JQFields("tarif", "Tarif", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|required|numeric");
        $fields[] = $one;

        $one = new JQFields("tgl_berlaku", "Tgl Berlaku", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|required|date");
        $one->setDisplayEvalToShow("date('d/m/Y', strtotime('{value}'))");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

        $this->search_fields = [
            "nama",
            "tarif",
            "tgl_berlaku",
        ];
    }
}
