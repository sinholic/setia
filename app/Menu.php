<?php

namespace App;

use function foo\func;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class Menu extends Model
{

    {
        

        protected $table = "a_menu";
        $this->field_id = "id";
        $this->field_desc = "link_label";

        protected $fillable = [
            "link_label",
            "link_url",
            "link_desc",
            "is_frame",
            "is_public",
            "id_group_user",
            "id_group_menu",
            "is_show_on_sidebar",
            "notes",
        ];
//region select_fields
        $select_fields = [];
        $one = new JQSelect("a.id");
        $select_fields[] = $one;
        $one = new JQSelect("a.id_group_menu");
        $select_fields[] = $one;
        $one = new JQSelect("b.nama", "nama_group");
        $select_fields[] = $one;
        $one = new JQSelect("a.link_label");
        $select_fields[] = $one;
        $one = new JQSelect("a.link_url");
        $select_fields[] = $one;
        $one = new JQSelect("a.link_desc");
        $select_fields[] = $one;
        $one = new JQSelect("a.is_frame");
        $select_fields[] = $one;
        $one = new JQSelect("a.is_public");
        $select_fields[] = $one;
        $one = new JQSelect("a.is_show_on_sidebar");
        $select_fields[] = $one;
        $one = new JQSelect("b.is_show_on_sidebar", "is_show_on_sidebar_group");
        $select_fields[] = $one;
        $one = new JQSelect("a.created_at");
        $select_fields[] = $one;
        $one = new JQSelect("a.notes");
        $select_fields[] = $one;
        $one = new JQSelect("_GroupUser");
        $select_fields[] = $one;
        $this->select_fields = $select_fields;
        //endregion select_fields

        //region search_fields
        $search_fields = [
            "a.link_label",
            "a.link_url",
            "a.link_desc",
            "_GroupUser",
        ];
        $this->search_fields = $search_fields;
        //endregion select_fields

        $this->timestamps = true;

        //region the fields
        //here you can set the: fields, rules, etc
        $fields = array();
        $one = new JQFields("id", "ID");
        $fields[] = $one;

        $one = new JQFields("id_group_menu", "Group Menu", JQFIELDS_INPUT_TYPE_SELECT);
//        $one->setListIsVisible(false);
        $one->setInputRelModelName("AGroupMenu");
        $one->setDisplayFieldToShow("nama_group");
        $fields[] = $one;


        $one = new JQFields("link_label", "Label");
        $one->setInputRules("bail|sometimes|required|max:50|is_unique:$this->table,$this->field_id!={id} and :attribute='{value}'");
        $fields[] = $one;

        $one = new JQFields("link_url", "URL");
        $one->setInputTextBelowElement("Tulis URL yang Anda inginkan");
        $one->setInputRules("bail|sometimes|required");
        $one->setInputType(JQFIELDS_INPUT_TYPE_URL);
//        $one->setInputIsEditable(0);
//        $one->setListFieldToShow("link_label");
//        $one->setListParseToShow("Click Here: <a target='_blank' class='link-ajax' href='{link_url}'>{link_label}</a>");
//        $one->setListEvalToShow("'<a href=\"{link_url}\">{link_label}</a>'");
        $fields[] = $one;

        $one = new JQFields("is_frame", "Link Eksternal", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputTextBelowElement("Centang jika ini adalah Link External");
        $fields[] = $one;

        $one = new JQFields("is_public", "Public", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputTextBelowElement("Centang jika ini boleh diakses untuk public");

        $one->setInputClass("chk-all-parent");
        $array_data_element = [
            "chk-all-for"=>"input_is_public"
        ];
        $one->setInputDataElement($array_data_element);
        $fields[] = $one;


        $one = new JQFields("_GroupUser", "Group User", JQFIELDS_INPUT_TYPE_CHECK_MULTIPLE);
        $one->setListIsVisible(false);
        $one->setInputRelModelName("XGroupUser");
        $one->setInputClass("chk-all-children");
        $array_data_element = [
            "chk-all-for"=>"input_is_public"
        ];
        $one->setInputDataElement($array_data_element);
        $one->setInputRelMultipleFunctionToGetData("get_group_user_by_id");
        $one->setInputRelMultipleTableName("a_menu_and_group_user");
        $one->setInputRelMultipleTableHeaderId("id_menu");
        $one->setInputRelMultipleTableDetailId("id_group_user");
        $fields[] = $one;

        $one = new JQFields("is_show_on_sidebar", "Show On Sidebar", JQFIELDS_INPUT_TYPE_CHECK_BOOLEAN);
        $one->setInputTextBelowElement("Centang untuk ditambilkan di Sidebar");
        $fields[] = $one;

        $one = new JQFields("created_at", "Input Date");
        $one->setInputIsGenerateInput(false);
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
        $model->leftJoin("a_group_menu AS b", "b.id", "=", "a.id_group_menu");

        return $model;
    }

    public function get_group_user_by_id($id) {
        $model = DB::table("a_menu_and_group_user AS a");
        $model->join("xgroup_user AS b", "a.id_group_user", "=", "b.id");

        $model->select("b.id", "b.nama");
        $model->where("a.id_menu", $id);
        $rows = $model->get();

        return $rows;
    }

    public function get_by_group_user($id_group_user, $is_get_public_also = true, $is_show_sidebar_only = true) {
        $db_connection = env('DB_CONNECTION');
        $model = $this->get_model();

        $search = "";
        if($id_group_user) {
            $search .= " a.id in(select id_menu from a_menu_and_group_user where id_group_user=$id_group_user) ";
        } else {
            $is_get_public_also = 1;
        }
        if($is_get_public_also) {
            $search .= $search ? " or " : "";
            $search .= " a.is_public='1' ";
        }
        if($is_show_sidebar_only ) {
            $search = $search ? " ($search) and " : "";

            if($id_group_user) {
                $search .= " a.is_show_on_sidebar='1' and b.is_show_on_sidebar = '1' ";
            } else {
                $search .= " a.is_show_on_sidebar='1' ";
            }
        }
        $model->whereRaw($search);


        $model->orderBy("b.nama", "asc");
        $model->orderBy("a.link_label", "asc");

        $model = $this->get_select($model);

        DB::enableQueryLog();
        $rows = $model->get();

        $log = DB::getQueryLog();
        DB::disableQueryLog();
        if(is_log_query() || is_log_query_master()) {
            log_to_file($log, "SQL-QUERY");
        }
        if(is_log_query_master_chrome()) {
            chrome_log($log);
        }


        return $rows;
    }

    function proses_delete($id)
    {
        $ok = parent::proses_delete($id); // TODO: Change the autogenerated stub
        $msg = "";

        if($ok) {
            DB::table("a_menu_and_group_user")->where("id_menu", $id)->delete();
        }

        $data = array();
        $data["ok"] = $ok;
        $data["msg"] = $msg;

        return $data;
    }
}
