<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class GroupMenu extends Model
{
    protected $table = "a_group_menu";

    protected $guarded = [
    ];
    
    public function menus()
    {
        return $this->hasMany('App\Menu', 'id_group_menu');
    }
}
