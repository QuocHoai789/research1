<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Config extends Model
{
    protected $table = "config";

    protected static  function getUserNameGmail(){

        return Config::where('key','user_name_gmail')->first()->value;
    }
    protected static function getPasswordGmail(){
        return Config::where('key','password_gmail')->first()->value;
    }
    protected static function getBasicSalary(){
        return Config::where('key','basic_salary')->first()->value;
    }
}
