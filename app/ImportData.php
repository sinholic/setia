<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    protected $table = "a_import_data";
    protected $guarded = [

    ];

    public function upload_history()
    {
        return $this->hasMany('App\UploadHistory', 'importdata_id');
    }
}
