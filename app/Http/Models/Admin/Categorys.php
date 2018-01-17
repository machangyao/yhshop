<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{

	public $table = "categorys";
    // 去掉laravel自动维护的两个字段created_at,updated_at
    public $timestamps = false;


}
