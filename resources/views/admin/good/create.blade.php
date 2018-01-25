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
                        <div class="box-header with-border">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="/good" method="post" class="form-horizontal" enctype="multipart/form-data">   
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">分类</label>

                                    <div class="col-sm-3">

                                        <select name="id" class="form-control">
                                            <option value="0">==请选择==</option>
                                            @foreach($cates as $v)
                                            <?php
                                                $arr = explode(',',$v->path);
                                                $n = count($arr) - 1;
                                            ?>

                                            <option value="{{ $v->id }}" @if(in_array($v->id,$pid)) disabled @endif>

                                            @if($v->pid == 0)
                                                {{ str_repeat('&nbsp;',($n*11)-22) }}
                                            @else
                                                {{ str_repeat('&nbsp;',($n*11)-22).'|--' }}
                                            @endif
                                            {{ $v->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">名称</label>

                                    <div class="col-sm-4">

                                        <input type="text" name="name" class="form-control" id="inputEmail3" value="{{ old('name') }}" placeholder="请输入商品名称">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">货号</label>

                                    <div class="col-sm-4">

                                        <input type="text" name="sn" class="form-control" id="inputEmail3" value="<?php echo 'YH'.str_random(4) ?>" placeholder="请输入商品货号">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">价格</label>

                                    <div class="col-sm-2">

                                        <input type="text" name="price" class="form-control" id="inputEmail3" value="{{ old('price') }}" placeholder="请输入商品价格">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">市场价格</label>

                                    <div class="col-sm-2">

                                        <input type="text" name="market_price" class="form-control" id="inputEmail3" value="{{ old('market_price') }}" placeholder="请输入商品市场价格">

                                    </div>
                                </div>
                            </div>
                             <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">品牌</label>

                                    <div class="col-sm-2">
                                        <select name="bid" class="form-control">
                                            <option value="0">==请选择==</option>
                                            @foreach($brands as $v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">库存</label>

                                    <div class="col-sm-2">

                                        <input type="text" name="number" class="form-control" id="inputEmail3" value="{{ old('number') }}" placeholder="请输入商品库存">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">图片</label>

                                    <div class="col-sm-4">
                                        <input type="file" name="pic" id="inputEmail3" placeholder="请上传商品图片">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">关键字</label>

                                    <div class="col-sm-4">

                                        <input type="text" name="keyword" class="form-control" id="inputEmail3" value="{{ old('keyword') }}" placeholder="请输入商品关键字">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">描述</label>

                                    <div class="col-sm-4">

                                        <input type="text" name="description" class="form-control" id="inputEmail3" value="{{ old('description') }}" placeholder="请输入商品描述">

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">商品详情</label>

                                    <div class="col-sm-9">
										<!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain"></script>
                                        <!-- 配置文件 -->
                                        <script type="text/javascript" src="/yh/ueditor/ueditor.config.js"></script>
                                        <!-- 编辑器源码文件 -->
                                        <script type="text/javascript" src="/yh/ueditor/ueditor.all.js"></script>
                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('container');
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">添加</button>
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