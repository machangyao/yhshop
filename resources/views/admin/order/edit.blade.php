@extends('layouts.admin.layout')

@section('content')
    <style type="text/css">
        .form-group{ margin-bottom: 0;}
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改订单
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active"></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{url('/admin/order/'.$data->id)}}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">收货地址</label>

                                    <div class="col-sm-4">
                                        <input type="text" value="{{$data->order_addr}}" name="order_addr" class="form-control" id="inputEmail3" placeholder="请输入品牌名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">订单价格</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="order_price" value='{{$data->order_price}}' class="form-control" id="inputEmail3" placeholder="请输入品牌网址">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">修改</button>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop