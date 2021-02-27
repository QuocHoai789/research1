<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';

    public function user()
    {
    	return $this->belongsTo('App\User', 'users_id');
    }
    public function registerdoc()
    {
    	return $this->hasOne('App\Register_Documents','id', 'register_id');
    }
     public function discuss_doc()
    {
        //kết bảng n-1
        return $this->hasMany('App\DiscussDocument','id_doc','id');
    }
    public function extension(){
        return $this->hasOne('App\DocumentExtension','id','document_extension_id');
    }
    public function cancel(){
        return $this->hasOne('App\DocumentCancel','id','document_cancel_id');
    }
}
