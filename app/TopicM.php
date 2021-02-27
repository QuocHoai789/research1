<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RegisterTopic;
class TopicM extends Model
{
    protected $table='topic_m';
    public function getRegisterTopic()
    {
        return $this->hasOne('App\RegisterTopic', 'id', 'register_id');
    }
    public function user()
    {
        //kết bảng 1 nhiều
        return $this->belongsTo('App\User','users_id','id');
    }
      public function discuss_topic()
    {
        //kết bảng n-1
        return $this->hasMany('App\DiscussTopic','id_topic','id');
    }
    public function scientificexplanation()
    {
        return $this->hasOne('App\ScientificExplanation', 'id', 'scientific_explanation_id');
    }
    public function report()
    {
        return $this->hasOne('App\ScientificDeployReport','scientific_deploy_report_id');
    }
    public function extension()
    {
        return $this->hasOne('App\ScientificExtension' ,'scientific_extension_id');
    }
}
