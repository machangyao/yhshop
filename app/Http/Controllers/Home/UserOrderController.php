<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\orders;
use App\Http\Models\Home\User;
use Illuminate\Support\Facades\Input;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //马长遥 返回订单页面
        $user = User::find(20);
        $orders = $user->orders;
        // $goods = [];
        // foreach($orders as $v){
        //     $goods = $v->Goods;
        // }
        return view('home.user.order',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //订单详情 马长遥
        $order = orders::find($id);
        $addr = $order->addr;
        return view('home.user.orderdetail',compact('addr','order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(){
        //执行确认收货 马长遥
        $id = Input::get('id');
        $data = ['order_status'=>3];
        $res = orders::where('id',$id)->update($data);
        if($res){
            return back();
        }else{
            return back();
        }
    }
}
