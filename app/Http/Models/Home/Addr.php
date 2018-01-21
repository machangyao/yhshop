<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Addr extends Model
{
	//地址表模型
    public $table = 'addrs';
    public $primaryket = 'id';
	public $timestamps = false;
    public $guarded = [];
	

}
