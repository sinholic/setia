<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class GroupMenu extends Model
{
    protected $table = "a_group_menu";

    protected $fillable = [
        "nama",
        "is_show_on_sidebar",
        "notes",
    ];
}
