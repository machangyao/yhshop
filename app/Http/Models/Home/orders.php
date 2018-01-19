<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //订单表 马长遥
    public $table = 'orders';
    public $primaryKey = 'id';

    // public function User(){
    // 	return $this->belongsTo('App\Http\Models\Home\User','user_id','id');
    // }

    public function Goods(){
    	return $this->belongsToMany('App\Http\Models\Admin\Goods','order_goods','oid','gid');
    }

    public function addr(){
    	return $this->hasOne('App\Http\Models\Home\Addr','id','addr_id');
    }
}
