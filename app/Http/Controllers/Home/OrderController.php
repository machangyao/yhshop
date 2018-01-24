<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Addr;
use Session;

class OrderController extends Controller
{
    //显示订单页面
    public function index()
    {
    	//获取收货地址
    	$addr = Addr::all();
    	
    	//获取默认地址
    	$defaultaddr = Addr::where('addr_status',1)->first();
    	//默认地址存到session中
    	session::put('defaultaddr',$defaultaddr);

    	// dd(session('defaultaddr'));
    	return view('home.order',compact('addr'));
    }


    //数量增加
    public function orderaddnum(Request $request)
    {
    	//获取id
    	$id = $request->input('id');

    	$data = session('cart') ? session('cart') : [];

    	if($data)
    	{
    		foreach($data as $k=>$v)
    		{
    			if($v['id'] == $id)
    			{
    				$data[$k]['num'] = ++$data[$k]['num'];
    			}
    		}
    		// 把修改后的商品数量存入到session
    		$request->session()->put('cart',$data);
    	}

    	// return response()->json(['stauts'=>1]);
    	echo 1;

    }

    //数量减少
    public function orderminnum(Request $request)
    {
    	//获取id
    	$id = $request->input('id');

    	$data = session('cart') ? session('cart') : [];

    	if($data)
    	{
    		foreach($data as $k=>$v)
    		{
    			if($v['id'] == $id)
    			{
    				$data[$k]['num'] = --$data[$k]['num'];
    			}
    		}
    		// 把修改后的商品数量存入到session
    		$request->session()->put('cart',$data);
    	}

    	// return response()->json(['stauts'=>1]);
    	echo 1;
    }

}
