<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
      //用户表模型 马长遥
	public $table = 'users';
	public $primaryket = 'id';
	public $guarded = [];

    public $timestamps = false;

    public function orders(){

        return $this->hasMany('App\Http\Models\Home\orders', 'user_id', 'id');
    }

    public function collects(){
        return $this->hasMany('App\Http\Models\Home\collects', 'user_id', 'id');

    }
}
