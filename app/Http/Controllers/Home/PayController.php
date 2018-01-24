<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\orders;
use App\Http\Models\Home\Order_goods;
use Session;

class PayController extends Controller
{
    //付款成功页面
    public function index(Request $request)
    {
    	//订单收货地址
    	$order_addr = session('defaultaddr')->addr.' '.session('defaultaddr')->addrdetail;
    	//收货地址id
    	$addr_id = session('defaultaddr')->id;
    	//商品ID
    	$ids = $request->input('ids');
    	// dd($ids);
    	//商品数量
    	$num = $request->input('num');

    	//商品总数量
    	$goods_number = count($num);

    	//商品价格
    	$price = $request->input('price');
    	//订单总价格
    	$total = $request->input('total');
    	//用户ID
    	$user_id = session('user_info')->id;
    	//订单号生成
    	$order_sn = 'YH'.time().mt_rand(100000,999999); 
    	//生成订单
    	
    	
    	//添加到订单和商品关联表
    	for($i=0;$i<count($ids);$i++)
    	{
    		$order_goods = new Order_goods;

    		$order_goods['gid'] = $ids[$i];
    		$order_goods['order_sn'] = $order_sn;
    		$order_goods['gcount'] = $num[$i];

    		$order_goods->save();

    	}

    	//添加到订单表
    	$data = new orders;
    	$data['user_id'] = $user_id;
    	$data['order_addr'] = $order_addr;
    	$data['order_price'] = $total;
    	$data['addr_id'] = $addr_id;
    	$data['order_sn'] = $order_sn;
    	$data['goods_number'] = $goods_number;
    	
    	$data->save();

        //删除已经下过订单的购物车商品
        $data = session('cart') ? session('cart') : [];
        // dd($data);

        $idin = Order_goods::where('order_sn',$order_sn)->select('gid')->get();
        //把对象转换为数组
        $idin = $idin -> toArray();

        foreach($idin as $v)
        {
            $newidin[] = $v['gid'];
        }


        foreach($data as $k=>$v)
        {

            if( in_array($v['id'],$newidin) )
            {
                unset($data[$k]);
            }

        }

        //修改后的数据写入session
        session::put('cart',$data);

    	return redirect('/success/'.$order_sn);
    }
}
