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
}
