<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

	
	public $table = "goods";

	public $primaryKey = 'id';


	// 商品表与分类表的动态属性,查找所属分类id的分类名
	public function categorys()
	{
		return $this->belongsTo('App\Http\Models\Admin\Categorys','cid','id');
	}

	// 商品表与品牌表的动态属性,查找所属品牌id的品牌名
	public function brands()
	{
		return $this->belongsTo('App\Http\Models\Admin\Brands','bid','id');
	}


	public function gct(){
	    return $this->hasOne('App\Http\Models\Home\Order_goods','gid','id');
    }

	// public function orders(){
 //    	return $this->belongsTo('App\Http\Models\Home\orders','gid','id');
	// }

    //
    public $timestamps = false;

    public $guarded = [];


}
