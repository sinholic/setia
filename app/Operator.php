<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

Class Operator extends Model
{

    {
        

        protected $table = "a_operator";
        $this->field_desc = "nama";

        protected $fillable = [
            "nama",
            "kode",
            "parentorg",
            "comments",
            "address",
            "phone",
            "contact_person_nama",
            "contact_person_email",
            "contact_person_phone",
            "register_date",
            "kategori",
            "building",
            "kota",
            "id_tipe_organisasi",
            "id_negara",
            "notes",
            "_GroupOperator",
			"mnc",
			"network_display",
        ];
//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;

        $one = new JQSelect("a.nama");
        $select_fields[] = $one;

        $one = new JQSelect("a.kode");
        $select_fields[] = $one;

        $one = new JQSelect("a.mnc");
        $select_fields[] = $one;

		$one = new JQSelect("a.network_display");
        $select_fields[] = $one;

        $one = new JQSelect("a.notes");
        $select_fields[] = $one;

        $one = new JQSelect("a.id_negara");
        $select_fields[] = $one;
        $one = new JQSelect("a.parentorg");
        $select_fields[] = $one;
        $one = new JQSelect("a.comments");
        $select_fields[] = $one;
        $one = new JQSelect("a.address");
        $select_fields[] = $one;
        $one = new JQSelect("a.phone");
        $select_fields[] = $one;
        $one = new JQSelect("a.contact_person_nama");
        $select_fields[] = $one;
        $one = new JQSelect("a.contact_person_email");
        $select_fields[] = $one;
        $one = new JQSelect("a.contact_person_phone");
        $select_fields[] = $one;
        $one = new JQSelect("a.register_date");
        $select_fields[] = $one;
        $one = new JQSelect("a.kategori");
        $select_fields[] = $one;
        $one = new JQSelect("a.building");
        $select_fields[] = $one;
        $one = new JQSelect("a.kota");
        $select_fields[] = $one;
        $one = new JQSelect("a.id_tipe_organisasi");
        $select_fields[] = $one;

        $one = new JQSelect("b.nama", "nama_negara");
        $select_fields[] = $one;
        $one = new JQSelect("c.nama", "nama_tipe_organisasi");
        $select_fields[] = $one;

        $this->select_fields = $select_fields;
        //endregion select_fields

        //region search_fields
        $search_fields = [
            "a.kode",
            "a.nama",
            "a.address",
            "a.phone",
            "a.contact_person_nama",
            "a.kota",
            "b.nama",
            "c.nama",
        ];
        $this->search_fields = $search_fields;
        //endregion select_fields

        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("nama", "Nama");
        $one->setInputRules("bail|sometimes|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("kode", "Kode");
        $one->setInputRules("bail|sometimes|required|max:50");
        $fields[] = $one;

        $one = new JQFields("mnc", "MNC");
        $one->setInputRules("max:50");
        $fields[] = $one;

		$one = new JQFields("network_display", "Network Display");
        $one->setInputRules("max:50");
        $fields[] = $one;

        $one = new JQFields("parentorg", "Parent Org");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("comments", "Comments");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("address", "Address");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("phone", "Phone");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("contact_person_nama", "Contact Person - Name");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("contact_person_email", "Contact Person - Email");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("contact_person_phone", "Contact Person - Phone");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("register_date", "Register Date", JQFIELDS_INPUT_TYPE_DATE);

        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("kategori", "Kategori");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("building", "Building");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;
        $one = new JQFields("kota", "City");
        $one->setInputRules("max:50");
        $one->setListIsVisible(false);
        $fields[] = $one;

        $one = new JQFields("id_negara", "Negara", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("ANegara");
        $one->setDisplayFieldToShow("nama_negara");
        $fields[] = $one;

        $one = new JQFields("id_tipe_organisasi", "Tipe Organisasi", JQFIELDS_INPUT_TYPE_SELECT);
        $one->setInputRelModelName("ATipeOrganisasi");
        $one->setDisplayFieldToShow("nama_tipe_organisasi");
        $fields[] = $one;



        $one = new JQFields("_GroupOperator", "Group Operator", JQFIELDS_INPUT_TYPE_CHECK_MULTIPLE);
        $one->setListIsVisible(false);
        $one->setInputRelModelName("AGroupOperator");
        $one->setInputClass("chk-all-children");
        $array_data_element = [
            "chk-all-for"=>"input_is_public"
        ];
        $one->setInputDataElement($array_data_element);
        $one->setInputRelMultipleFunctionToGetData("get_group_operator_by_id");
        $one->setInputRelMultipleTableName("a_operator_and_group_operator");
        $one->setInputRelMultipleTableHeaderId("id_operator");
        $one->setInputRelMultipleTableDetailId("id_group_operator");
        $fields[] = $one;


        $one = new JQFields("notes", "Remark", JQFIELDS_INPUT_TYPE_TEXTAREA);
        $one->setListIsVisible(false);
        $one->setInputRules("max:250");
        $fields[] = $one;

        $this->the_fields = $fields;
        //endregion the fields

    }
    //custom, join
    public function get_model()
    {
        $model = DB::table("$this->table AS a");
        $model->leftJoin("a_negara AS b", "b.id", "=", "a.id_negara");
        $model->leftJoin("a_tipe_organisasi AS c", "c.id", "=", "a.id_tipe_organisasi");

        return $model;
    }


    public function save_roaming_partner($id, $data_batch) {
        $id_operator = $id;

        $ok = 0;
        $msg = "";
        try {
            $table = "a_operator_roaming_partner";
            DB::table($table)->where("id_operator", $id_operator)->delete();

            if($data_batch) {
                DB::table($table)->insert($data_batch);
            }
            $ok = 1;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        $data = array();
        $data["ok"] = $ok;
        $data["msg"] = $msg;

        return $data;
    }

    public function get_roaming_partner_by_id($id) {
        $table = "a_operator_roaming_partner";
        $model = DB::table("$table AS a");
        $model->join("a_roaming_partner AS b", "b.id", "=", "a.id_roaming_partner");
        $model->join("a_opsi_roaming_partner AS c", "c.id", "=", "a.id_opsi_roaming_partner");
        $model->where("a.id_operator", $id);
        $select = [
            "a.*",
            "b.nama as nama_roaming_partner",
            "c.nama as nama_opsi_roaming_partner",
        ];
        $master = $model->get($select);

        return $master;
    }

    public function get_rate_interkoneksi_by_id($id) {
        $ARateInterkoneksiOperator = new ARateInterkoneksiOperator();
        $filter = [
            array("a.id_operator", "=", $id),
        ];
        $ARateInterkoneksiOperator->setFilterArray($filter);
        $master = $ARateInterkoneksiOperator->get_list_data_only();
        return $master;
    }

    public function get_by_id($id)
    {
        $master = parent::get_by_id($id); // TODO: Change the autogenerated stub
        if($master) {
            $roaming_partner = $this->get_roaming_partner_by_id($id);
            $get_rate_interkoneksi_by_id = $this->get_rate_interkoneksi_by_id($id);

            $master->_RoamingPartner = $roaming_partner;
            $master->_RateInterkoneksi = $get_rate_interkoneksi_by_id;
        }

        return $master;
    }



    public function get_group_operator_by_id($id) {
        $model = DB::table("a_operator_and_group_operator AS a");
        $model->join("a_group_operator AS b", "a.id_group_operator", "=", "b.id");

        $model->select("b.id", "b.nama");
        $model->where("a.id_operator", $id);
        $rows = $model->get();

        return $rows;
    }

}
