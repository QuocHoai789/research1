<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
     protected $table = "topic";
    public function user()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\User','id_user','id');
    }
}
