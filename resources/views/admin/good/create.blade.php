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
                        <form action="/category" method="post" class="form-horizontal">   
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">分类</label>
                                    <div class="col-sm-2">
                                        <select name="pid" class="form-control">
                                            <option value="0">==请选择==</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">名称</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">货号</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">价格</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                             <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">品牌</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">库存</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">图片</label>

                                    <div class="col-sm-4">
                                        <input type="file" name="name" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">详情</label>

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