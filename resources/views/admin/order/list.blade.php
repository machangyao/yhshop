@extends('layouts.admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>    订单管理
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active"></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/admin/order')}}" method="get">
                                <div class="row">

                                    <div class="col-xs-6"></div>
                                    <div class="col-xs-4">
                                        <div class="input-group input-group">
                                              <input type="text" name="keyword" value="" class="form-control" placeholder="请输入搜索条件">
                                              <span class="input-group-btn">
                                              <button class="btn btn-info btn-flat">搜索</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
							<br>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>订单ID</th>
                                    <th>订单编号</th>
                                    <th>商品数量</th>
                                    <th>订单价格</th>
                                    <th>订单状态</th>
                                    <th>支付类型</th>
                                    <th>订单收货地址</th>
                                    <th>用户</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach ($orders as $v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->order_sn}}</td>
                                        <td>{{$v->goods_number}}</td>
                                        <td>{{$v->order_price}}</td>
                                        <td>@if ($v->order_status == 1) 等待发货 @elseif ($v->order_status == 2) 等待收货 @elseif ($v->order_status == 3 ) 已收货 @endif </td>
                                        <td>{{$v->pay_type}}</td>
                                        <td>{{$v->addr->addr}}{{$v->addr->addrdetail}}</td>

                                            <td>{{$v->user->user_name}}</td>

                                        <td>  @if ($v->order_status == 1) <a href="{{url('/admin/order/status/')}}?id=
                                    {{$v->id}}"> 发货 </a> @elseif ($v->order_status == 2)已发货 @elseif ($v->order_status == 3)已收货 @endif  <a href="{{url('/admin/order/'.$v->id.'/edit')}}">修改</a> <a href="javascript:;" onclick="">删除</a><a
                                                    href ="javascript:;" class="layui-btn layui-btn-primary" id="click" onclick="aa({{$v->id}})"> 详情</a></td>
                                    </tr>
                                @endforeach
                                    <tr>

                                    </tr>
                                </tfoot>

                            </table>
                            {{ $orders->render() }}

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script type="text/javascript">
    function aa(id) {
        var addr = [];
        var goods = [];
            $.ajax({
                url:"{{url('/admin/order/ajax')}}",
                type:'post',
                async:false,
                data:{'id':id,'_token':'{{csrf_token()}}'},
                success:function (data) {
                    addr = data['addr'];
                    goods = data['goods'];
                }
            });
            var str = "<table border='1px solid red'><tr><td>地址:"+addr['addr']+addr['addrdetail']+"</td></tr><tr><td>收货人:"+addr['addr_name']+"</td></tr><tr><td>收货电话:"+addr['addr_tel']+"</td></tr></table>";

            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['820px', '440px'], //宽高
                content:str
            });
    }

</script>
@stop