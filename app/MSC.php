<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class MSC extends Model
{

    {
        

        protected $table = "a_msc";

        protected $fillable = [
            "kode",
            "nama",
            "notes",
            "nama_kota",
			"recentity",
			"gt",
			"filename",
			"notes",
			"status",
        ];
        $this->timestamps = true;


        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("kode", "Kode");
        $one->setInputRules("bail|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("bail|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

		$one = new JQFields("recentity", "Recentity");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;

		$one = new JQFields("gt", "GT");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;

		$one = new JQFields("filename", "Filename");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;

		$one = new JQFields("status", "Status", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AStatusDataSwitch");
        $one->setDisplayFieldToShow("status");
        $fields[] = $one;

		$one = new JQFields("nama_kota", "Kota", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("AKota");
        $one->setDisplayFieldToShow("nama_kota");
        $fields[] = $one;

        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields



//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.kode");
        $select_fields[] = $one;

        $one = new JQSelect("a.nama");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_kota");
        $select_fields[] = $one;

		$one = new JQSelect("a.notes");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_kota");
        $select_fields[] = $one;

		$one = new JQSelect("c.recentity", "recentity");
        $select_fields[] = $one;

		$one = new JQSelect("c.gt", "gt");
        $select_fields[] = $one;

		$one = new JQSelect("c.filename", "filename");
        $select_fields[] = $one;

		$one = new JQSelect("d.nama", "status");
        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select_fields

    }

    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->join("a_kota AS b", "b.id", "=", "a.id_kota");
		$model->leftJoin("a_data_switch AS c", "c.id_msc", "=", "a.id");
		$model->leftJoin("a_status_data_switch AS d", "d.id", "=", "c.id_status_data_switch");

        return $model;
    }

	 public function get_data_switch_by_id($id) {
        $ADataSwitch = new ADataSwitch();
        $filter = [
            array("c.id_msc", "=", $id),
        ];
        $ADataSwitch->setFilterArray($filter);
        $master = $ADataSwitch->get_list_data_only();
        return $master;
    }

	public function get_status_data_switch_by_id($id) {
        $AStatusDataSwitch = new AStatusDataSwitch();
        $filter = [
            array("c.id_status_data_switch", "=", $id),
        ];
        $AStatusDataSwitch->setFilterArray($filter);
        $master = $AStatusDataSwitch->get_list_data_only();
        return $master;
    }
}
