<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Addr;
use Session;

class OrderController extends Controller
{

    /*
    * 确认订单页
    * @author taidmin
    * @return 返回订单页视图
    */
    public function index()
    {
        //获取传过来的购物车商品ID
        $id = $_GET['id'] ? $_GET['id'] : '';
        $idarr = explode(',',$id);
        // dd($idarr);


    	//获取收货地址
    	$addr = Addr::all();
    	
    	//获取默认地址
    	$defaultaddr = Addr::where('addr_status',1)->first();
    	//默认地址存到session中
    	session::put('defaultaddr',$defaultaddr);
        
        //获取session里面的购物车商品
        $data = session('cart') ? session('cart') : [];
        // dd($data);
        
        //如果购物车的商品ID在传过来的商品ID里面,则把购物车的商品赋给一个新数组
        $newdata = [];

        foreach($idarr as $key=>$value)
        {
            foreach($data as $k=>$v)
            {
                if( $v['id'] == $value )
                {
                    $newdata[] = $v;
                }
            }
        }

        // dd($newdata);

    	return view('home.order',compact('addr','newdata'));
    }


    /*
    * 数量增加
    * @author taidmin
    * @return 返回增加后的状态
    */
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


    /*
    * 数量减少
    * @author taidmin
    * @return 返回减少后的状态
    */
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
