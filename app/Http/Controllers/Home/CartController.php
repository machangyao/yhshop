<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Goods;
use Session;

class CartController extends Controller
{

	//加入购物车
	public function addCart(Request $request)
	{
		//1、判断用户是否登录,如果没有登录则跳转到登录页
    	if( !session::get('user_info') )
    	{
    		return redirect('login')->with('info','您还没有登录,请先登录');
    	}

    	//2、如果登录后,返回上次操作的页面
    	// if(session::get('user_info'))
    	// {
    	// 	return back();
    	// }

    	//2、拼装session数组
    	$data = session('cart') ? session('cart') : [];

    	//判断如果购买同样的商品,则数量在原来的基础上增加
    	$flag = 0;
    	if($data)
    	{
    		foreach($data as $k=>&$v)
    		{
    			if($v['id'] == $_GET['id'])
    			{
    				$v['num'] += $_GET['num'];
    				$flag = 1;
    			}
    		}
    	}

    	//如果没有购买同样的商品
    	if(!$flag)
    	{
			$data[] = [
	    		'id' => $_GET['id'],
	    		'num' => $_GET['num'],
	    		'goodinfo' => Goods::where('id',$_GET['id'])->first(),
	    	];
    	}
    	

    	//3、把商品信息存入到session,追加
    	$request->session()->put('cart',$data);

    	return redirect('/cart');
    	

	}

    //购物车页面
    public function index()
    {
    	// dd(session('cart'));
    	return view('home.cart');
    }

    //数量增加
    public function addnum(Request $request)
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
    public function minnum(Request $request)
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


    //删除购物车商品
    public function delcart(Request $request)
    {
    	$id = $request->input('id');
		$data = session('cart') ? session('cart') : [];

    	if($data)
    	{
    		foreach($data as $k=>$v)
    		{
    			if($v['id'] == $id)
    			{
    				unset($data[$k]);
    			}
    		}
    		// 把修改后的商品数量存入到session
    		$request->session()->put('cart',$data);
    	}

    	// return response()->json(['stauts'=>1]);
    	echo 1;
    }

    //删除购物车选中的商品
    public function clearcart(Request $request)
    {
    	$idstr = $request->input('id');
    	//将字符串转成数组
    	$idarr = explode(',',$idstr);
    	//return $idstr;

		$data = session('cart') ? session('cart') : [];

    	if($data)
    	{
    		foreach($data as $k=>$v)
    		{
    			if( in_array($v['id'],$idarr) )
    			{
    				unset($data[$k]);
    			}
    		}
    		// 把修改后的商品数量存入到session
    		$request->session()->put('cart',$data);
    	}

    	// return response()->json(['stauts'=>1]);
    	echo 1;
    	
    }

}
