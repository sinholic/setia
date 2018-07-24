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

    public function operators()
    {
        return $this->belongsToMany('App\Operator', 'a_operator_and_group_operator', 'id_operator', 'id_group_operator')
            ->withPivot('notes', 'created_by', 'updated_by')
            ->withTimestamps();
    }
}
