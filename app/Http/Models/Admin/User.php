<?php

namespace App\HTTP\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //让当前的user模型跟admin_users表产生关联
	public $table = 'admin_users';
    //定义关联表的主键
    	public $primarykey = 'id';
    	public $timestamp = false;


    //不允许批量修改的字段
    	public $guarded = [];
}

