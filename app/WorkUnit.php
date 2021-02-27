<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model
{
    protected $table = 'work_unit';

    public function user(){
    	return $this->hasMany('App\User', 'work_unit_id');
    }
}
