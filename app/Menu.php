<?php

namespace App;

use function foo\func;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

Class Menu extends Model
{
    protected $table = "a_menu";

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
}
