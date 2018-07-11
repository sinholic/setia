<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

Class TelinTarifLog extends Model
{

    {
        

        protected $table = "a_telin_tarif_log";

        protected $fillable = [
            "id_telin_tarif",
            "nama",
            "tarif",
            "tarif_previous",
            "tgl_berlaku",
            "notes",
        ];
        $this->timestamps = true;

        $this->search_fields = [
            "nama",
            "tarif",
            "tgl_berlaku",
        ];


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("tarif", "Tarif", JQFIELDS_INPUT_TYPE_TEXT);
        $one->setInputRules("bail|required|numeric");
        $one->setDisplayEvalToShow("number_format('{value}')");
        $fields[] = $one;

//        $one = new JQFields("tarif_previous", "Tarif Sebelumnya", JQFIELDS_INPUT_TYPE_TEXT);
//        $one->setInputRules("bail|required|numeric");
//        $one->setDisplayEvalToShow("number_format('{value}')");
//        $fields[] = $one;

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

    }
}
