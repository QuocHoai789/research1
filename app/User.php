<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_number','access_right','more_user_information','work_unit_id', 'degree'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
      public function topic()
    {
        //kết bảng n-1
        return $this->hasMany('App\Topic','id_user','id');
    }
    public function topic_m()
    {
        //kết bảng n-1
        return $this->hasMany('App\TopicM','users_id','id');
    }
     public function discuss_topic()
    {
        //kết bảng n-1
        return $this->hasMany('App\DiscussTopic','id_user_discuss','id');
    }
    public function workunit(){
        return $this->belongsTo('App\WorkUnit', 'work_unit_id');
    }
    public function extension(){
        return $this->hasMany('App\ScientificExtension', 'users_id');
    }
    public function discuss_doc(){
        return $this->hasMany('App\DiscussDocument', 'id_user_discuss','id');
    }
    

}
