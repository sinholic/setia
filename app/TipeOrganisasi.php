<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


Class TipeOrganisasi extends Model
{
    protected $table = "a_tipe_organisasi";

    protected $fillable = [

    ];

    public function operators()
    {
        return $this->hasMany('App\Operator', 'id_tipe_organisasi');
    }

}
