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
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-xs-2">
                                            <select name="num" class="form-control">
                                                <option >2</option>
                                                
                                            </select>
                                    </div>
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
                                    <th>订单价格</th>
                                    <th>订单状态</th>
                                    <th>支付类型</th>
                                    <th>订单收货地址</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach ($orders as $v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->order_number}}</td>
                                        <td>{{$v->order_price}}</td>
                                        <td>{{$v->order_status}}</td>
                                        <td>{{$v->pay_type}}</td>
                                        <td>{{$v->order_addr}}</td>
                                        <td> <a href="">修改</a> <a href="javascript:;" onclick="">删除</a></td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td style="text-align:center;" colspan="11">暂无品牌信息</td>
                                    </tr>
                                </tfoot>
                            </table>
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

</script>
@stop