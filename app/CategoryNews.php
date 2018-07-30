<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class CategoryNews extends Model
{
    protected $table = "a_category_news";

    // protected $fillable = [
    //     "nama",
    //     "notes",
    //     "created_by",
    //     "updated_by"
    // ];
    protected $guarded = [
    ];
    public function news_()
    {
        return $this->hasMany('App\News', 'id_category');
    }
}
