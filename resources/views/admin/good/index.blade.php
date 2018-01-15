@extends('layouts.admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
                <small>good</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">商品列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ session('info') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID编号</th>
                                    <th>名称</th>
                                    <th>货号</th>
                                    <th>缩略图</th>
                                    <th>价格</th>
                                    <th>分类</th>
                                    <th>品牌</th>
                                    <th>库存</th>
                                    <th>状态</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->sn }}</td>
                                    <td><img style="width:50px" src="./uploads/{{ $v->pic }}"></td>
                                    <td>{{ $v->price }}</td>
                                    <td>{{ $v->cid }}</td>
                                    <td>{{ $v->bid }}</td>
                                    <td>{{ $v->number }}</td>
                                    <td>{{ $v->status }}</td>
                                    <td>{{ $v->created_at }}</td>
                                    <td>修改 删除</td>
                                </tr>
                                @endforeach
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
@stop