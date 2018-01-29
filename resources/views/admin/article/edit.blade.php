@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper" style="min-height: 871px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑文章
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">编辑文章</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="">
            <div class="row" style="">
                <!-- right column -->
                <div class="col-md-12" style="">
                    <!-- Horizontal Form -->
                    <div class="box box-info" style="">
                        <div class="box-header with-border">
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        @if (count($errors) > 0)
                            <div >
                                <ul>
                                    @if(is_object($errors))
                                        @foreach ($errors->all() as $error)
                                            <li style="color:red">{{ $error }}</li>
                                        @endforeach
                                    @else
                                        <li style="color:red">{{ $errors }}</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('admin/article/'.$article->article_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_upload"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}


                            <div class="box-body">

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">文章作者</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="article_author" class="form-control" id="inputEmail3" value="{{ $article->article_author }}">
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">文章标题</label>

                                    <div class="col-sm-3">
                                        <input type="text" name="article_title" class="form-control" id="inputEmail3" value="{{ $article->article_title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">文章内容</label>

                                    <div class="col-sm-9">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="article_content" type="text/plain">{!! $article->article_content !!}</script>
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