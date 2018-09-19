<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IotImplement extends Model
{
    protected $table = "t_iot_implement";
    protected $primaryKey = 'id_iot'; 

    protected $guarded = [
    ];
}
