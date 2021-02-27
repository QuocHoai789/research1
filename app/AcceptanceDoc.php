<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceDoc extends Model
{
    protected $table = 'acceptance_doc';
    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user_acceptance');
    }
    public function document()
    {
    	return $this->belongsTo('App\Documents', 'id_doc');
    }
}
