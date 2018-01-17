<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	
	public $table = "Goods";

	// 商品表与分类表的动态属性,查找所属分类id的分类名
	public function Categorys()
	{
		return $this->belongsTo('Models\Admin\Categorys','cid','id');
	}
}
