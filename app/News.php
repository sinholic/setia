<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'a_news';
    //protected $guarded = [];
    protected $fillable = [
        "title",
        "konten",
        "is_publish",
        "notes",
        "img",
        "id_category",
    ];
  public function category()
      {
          return $this->belongsTo('App\CategoryNews', 'id_category');
      }
}
