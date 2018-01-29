<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\orders;
use App\Http\Models\Home\Order_goods;
use App\Http\Models\Home\Goods;
use Session;

class PayController extends Controller
{

    /*
    * 生成订单
    * @author taidmin
    */
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


        //读取当前下的订单表id，插入order_goods表中的oid中
        $idarr = orders::where('order_sn',$order_sn)->select('id')->get()->toArray();
        $oid = $idarr[0]['id'];
        $order_goods = new Order_goods;
        $order_goods->where('order_sn',$order_sn)->update(['oid'=>$oid]);


        //下单成功后原商品数量减去已经购买过的商品数量,减库存
        $or = Order_goods::where('order_sn',$order_sn)->select('gid','gcount')->get()->toArray();
        // dd($or);
        
        $newgood = [];
        foreach($or as $v)
        {
            //获取商品信息
            $g = Goods::where('id',$v['gid'])->select('id','number','salenum')->get()->toArray();
            //把三维数组转成二维数组
            $newgood[] = $g[0];
            foreach($newgood as &$vv)
            {
                //如果order_goods的gid等于商品表的id,则商品表里面的数量减去order_goods里面的数量
                if($v['gid'] == $vv['id'])
                {
                    $vv['number'] = $vv['number'] - $v['gcount'];
                    $vv['salenum'] = $vv['salenum'] + $v['gcount'];
                    //更新Goods表商品数量字段和销量字段
                    Goods::where('id',$vv['id'])->update(['number'=>$vv['number'],'salenum'=>$vv['salenum']]);
                }
            }
            
        }
        

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
