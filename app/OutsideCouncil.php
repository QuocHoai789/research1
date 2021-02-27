<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsideCouncil extends Model
{
    protected $table = 'outside_council_discuss';
    public function document()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\Documents','id_doc','id');    
    }
}
