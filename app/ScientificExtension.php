<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScientificExtension extends Model
{
    protected $table='scientific_extension';
    function user()
    {
    	return $this->belongsTo('App\User', 'users_id');
    }
}
