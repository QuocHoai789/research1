<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceTopic extends Model
{
    protected $table = 'acceptance_topic';
    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user_acceptance');
    }
    public function topic_m()
    {
    	return $this->belongsTo('App\TopicM', 'id_topic');
    }
}
