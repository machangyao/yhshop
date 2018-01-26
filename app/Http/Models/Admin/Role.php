<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $table = 'roles';

    public $primaryKey = "id";
    public $guarded = [];

    public $timestamp = false;
       //查找当前用户的角色   多对多
    	public function permission()
    	{
    		return $this->belongsToMany('App\Http\Models\Admin\Permission','permission_roles','roles_id','permission_id');
    	}
}
