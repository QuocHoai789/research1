<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussDocument extends Model
{
    protected $table = 'discuss_doc';

    public function user()
    {
    	return $this->belongsTo('App\User','id_user_discuss','id');
    }
    public function document()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\Documents','id_doc','id');    
    }
}
