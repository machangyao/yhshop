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
                {{ $title }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-horizontal">   
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品名称</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品分类</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->categorys->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">所属品牌</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->brands->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品价格</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">市场价格</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->market_price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">添加时间</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none">
                                            {{ $data->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group" style="height:150px;">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品图片</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none;height:auto;">
                                            <img style="width:200px" src="/uploads/{{ $data->pic }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品详情</label>
                                    <div class="col-sm-4">
                                        <div class="form-control" style="border:none; width:700px;height:auto;word-wrap:break-word;word-break: normal;">
                                            {!! $data->desc !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <!-- /.box-footer -->
                        </div>
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