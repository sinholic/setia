<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadHistory extends Model
{
    protected $table = "a_upload_history";
    protected $guarded = [

    ];

    public function import_data()
    {
        return $this->belongsTo('App\ImportData', 'importdata_id');
    }
}
