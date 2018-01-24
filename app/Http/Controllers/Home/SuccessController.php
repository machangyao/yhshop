<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\orders;

class SuccessController extends Controller
{

    //付款成功页面
    public function index($order_sn)
    {
    	$data = orders::where('order_sn',$order_sn)->with('orderaddr')->first();	
    	return view('home.success',compact('data'));
    }
}
