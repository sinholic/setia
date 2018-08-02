<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class Menu extends Model
{
    protected $table = "a_menu";

    // protected $fillable = [
    //     "link_label",
    //     "link_url",
    //     "link_desc",
    //     "is_frame",
    //     "is_public",
    //     "id_group_user",
    //     "id_group_menu",
    //     "is_show_on_sidebar",
    //     "notes",
    // ];
    protected $guarded = [
    ];

    public function group_menu()
    {
        return $this->belongsTo('App\GroupMenu', 'id_group_menu');
    }

    public function groupuser()
    {
        return $this->belongsToMany('App\XGroupUser', 'a_menu_and_group_user', 'id_menu', 'id_group_user')
            ->withPivot('created_by', 'updated_by')
            ->withTimestamps();
    }
}
