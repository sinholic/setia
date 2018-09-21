<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Implement extends Model
{
    protected $table = "a_implement";
    protected $guarded = [

    ];

    public function operator()
    {
        return $this->belongsTo('App\Operator', 'operator_id');
    }
}
