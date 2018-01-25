@extends('layouts.home.layout')
@section('title','付款成功页面')
@section('style')
<link rel="stylesheet"  type="text/css" href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}"/>
<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/yh/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/sustyle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<script type="text/javascript" src="{{ asset('/yh/home/basic/js/jquery-1.7.min.js') }}"></script>
@stop
@section('content')
<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{ $data->order_price }}</em></li>
       <div class="user-info">
         <p>订单号：{{ $data->order_sn }}</p>
         <p>收货人：{{ $data->orderaddr->addr_name }}</p>
         <p>联系电话：{{ $data->orderaddr->addr_tel }}</p>
         <p>收货地址：{{ $data->order_addr }}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="{{ url('/user/order/') }}" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="../person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>
@stop