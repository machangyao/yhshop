<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
      //用户表模型
	public $table = 'users';
	public $primaryket = 'id';
	public $timestamps = false;
}
