<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsideEvalute extends Model
{
	protected $table = 'outside_council_evalute';
     public function document()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\Documents','id_doc','id');    
    }
}
