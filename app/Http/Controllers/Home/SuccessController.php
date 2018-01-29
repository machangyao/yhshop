<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\orders;
use App\Http\Models\Home\Order_goods;

class SuccessController extends Controller
{

    /*
    * 下单成功、付款成功
    * @author taidmin
    * @return 返回下单成功、付款成功视图
    */
    public function index($order_sn)
    {





    	$data = orders::where('order_sn',$order_sn)->with('orderaddr')->first();	
    	return view('home.success',compact('data'));
    }
}
