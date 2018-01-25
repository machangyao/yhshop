<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Order_goods extends Model
{
    //关联表
    public $table = "order_goods";

    //允许批量赋值
    public $guarded = [];
    
    //不维护created_at和updated_at
    public $timestamps = false;
    

}
