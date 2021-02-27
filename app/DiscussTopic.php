<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussTopic extends Model
{
     protected $table = "discuss_topic";
       public function user()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\User','id_user_discuss','id');    
    }
    public function topic_m()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\TopicM','id_topic','id');    
    }
}
