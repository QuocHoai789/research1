<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluteDoc extends Model
{
    protected $table = 'evalute_doc';

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user_evalute');
    }
    public function document()
    {
    	return $this->belongsTo('App\Documents', 'id_doc');
    }
    
}
