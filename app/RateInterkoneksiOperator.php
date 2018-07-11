<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class RateInterkoneksiOperator extends Model
{

    {
        

        protected $table = "a_rate_interkoneksi_operator";
        $this->field_desc = "nama_operator_service";

        protected $fillable = [
            "id_operator",
            "id_service",
            "id_opsi_unit_service",
            "nilai_unit",
            "nilai_rate",
            "tgl_berlaku",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("id_operator", "Operator", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AOperator");
        $one->setDisplayFieldToShow("nama_operator");
        $one->setInputRules("bail|sometimes|required");
        $one->setListIsVisible(false);
        $fields[] = $one;

        $one = new JQFields("nama_operator", "Nama Operator");
        $one->setInputIsGenerateInput(false);
        $fields[] = $one;

        $one = new JQFields("id_service", "Service", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AService");
        $one->setDisplayFieldToShow("nama_service");
        $one->setInputRules("bail|sometimes|required");
        $one->setListIsVisible(false);
        $fields[] = $one;

        $one = new JQFields("nama_service", "Nama Service");
        $one->setInputIsGenerateInput(false);
        $fields[] = $one;

        $one = new JQFields("is_opsi_unit_service", "Is Unit", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputIsGenerateInput(false);
        $fields[] = $one;

        $one = new JQFields("id_opsi_unit_service", "Unit", JQFIELDS_INPUT_TYPE_RADIO);
        $one->setInputRelModelName("AOpsiUnitService");
        $one->setDisplayFieldToShow("nama_opsi_unit_service");
//        $one->setListIsVisible(false);
        $fields[] = $one;

        $one = new JQFields("nilai_unit", "Nilai Unit", JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $one->setInputRules("bail|sometimes|numeric");
//        $one->setListIsVisible(false);
        $fields[] = $one;

        $one = new JQFields("nilai_rate", "Rate", JQFIELDS_INPUT_TYPE_NUMBER_ONLY);
        $one->setInputRules("bail|sometimes|numeric");
        $fields[] = $one;

        $one = new JQFields("tgl_berlaku", "Start", JQFIELDS_INPUT_TYPE_DATE);
        $one->setInputRules("bail|sometimes|required|date");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields


        //region select
        $select_fields = [];

        $one = new JQSelect("a.id_operator");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_service");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_opsi_unit_service");
        $select_fields[] = $one;

        $one = new JQSelect("a.nilai_unit");
        $select_fields[] = $one;

        $one = new JQSelect("a.nilai_rate");
        $select_fields[] = $one;

        $one = new JQSelect("a.tgl_berlaku");
        $select_fields[] = $one;

        $one = new JQSelect("concat(b.nama, ', ', c.nama)", "nama_operator_service");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_operator");
        $select_fields[] = $one;

        $one = new JQSelect("c.nama", "nama_service");
        $select_fields[] = $one;

        $one = new JQSelect("c.is_opsi_unit_service");
        $select_fields[] = $one;

        $one = new JQSelect("d.nama", "nama_opsi_unit_service");
        $select_fields[] = $one;

//        $one = new JQSelect("a.created_at");
//        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select
    }



    public function get_model() {
        $model = DB::table("$this->table AS a");
        $model->join("a_operator AS b", "b.id", "=", "a.id_operator");
        $model->join("a_service AS c", "c.id", "=", "a.id_service");
        $model->leftJoin("a_opsi_unit_service AS d", "d.id", "=", "a.id_opsi_unit_service");

        return $model;
    }
}
