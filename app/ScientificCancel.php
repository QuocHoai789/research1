<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScientificCancel extends Model
{
    protected $table='scientific_cancel';
    public function user()
    {
    	return $this->belongsTo('App\User' ,'users_id');
    }
}
