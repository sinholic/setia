<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class GroupUserMenuRelation extends Model
{
    protected $table = "a_menu_and_group_user";
    protected $fillable = [
        "id_menu",
        "id_group_user",
//            "notes",
    ];
}
