<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class Continent extends Model
{
    protected $table = "a_continent";

    protected $fillable = [
        "nama",
        "notes",
        "created_by",
        "updated_by"
    ];
}
