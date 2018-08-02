<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class XGroupUser extends Model
{
    protected $table = "xgroup_user";

    protected $guarded = [
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'id_group');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'a_menu_and_group_user', 'id_menu', 'id_group_user')
            ->withPivot('created_by', 'updated_by')
            ->withTimestamps();
    }
}
