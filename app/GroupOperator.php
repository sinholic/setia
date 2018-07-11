<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class GroupOperator extends Model
{
    protected $table = "a_group_operator";

    protected $fillable = [
        "nama",
        "notes",
    ];
}
