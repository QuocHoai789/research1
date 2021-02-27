<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ConfigEnv extends Model
{
    protected $table = "config";

    protected static  function getUserNameGmail(){

        return ConfigEnv::where('key','user_name_gmail')->first()->value;
    }
    protected static function getPasswordGmail(){
        return ConfigEnv::where('key','password_gmail')->first()->value;
    }
    protected static function getBasicSalary(){
        return ConfigEnv::where('key','basic_salary')->first()->value;
    }
    protected static function getDateStartRegisterTopic(){
        return ConfigEnv::where('key','date_start_register_topic')->first()->value;
    }
    protected static function getDateEndRegisterTopic(){
        return ConfigEnv::where('key','date_end_register_topic')->first()->value;
    }
    public function getEnvironmentValue($key){
        return ConfigEnv::where('key',$key)->first()->value;
    }
    public function setEnvironmentValue($key,$value){
        $config = ConfigEnv::where('key',$key)->first();
        if($config){
            $config->value = $value;
            $config->save();
        }
    }
}
