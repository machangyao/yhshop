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

    	//2、拼装session数组
    	$data = session('cart') ? session('cart') : [];
    	$data[] = [
    		'id' => $_GET['id'],
    		'num' => $_GET['num'],
    		'goodinfo' => Goods::where('id',$_GET['id'])->first(),
    	];

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

}
