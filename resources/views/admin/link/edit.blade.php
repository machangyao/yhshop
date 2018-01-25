@extends('layouts.admin.layout')

 @section('content')

<div class="content-wrapper" style="min-height: 871px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑友情链接
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">编辑友情连接</li>
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

                        <form action="{{ url('admin/link/'.$link->link_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" >   
                           {{ csrf_field() }}
                           {{ method_field('PUT') }}
                            <div class="box-body">
                                
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情链接地址</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="link_url" class="form-control" id="inputEmail3"  value="{{$link->link_url}}">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情连接文字描述</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="link_text" class="form-control" id="inputEmail3"  value="{{ $link->link_text }}">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情连接创建时间</label>

                                    <div class="col-sm-3">
                                        <input type="text" name="create_at" class="form-control" id="inputEmail3" value="{{$link->create_at}}">
                                    </div>
                                </div>
                            </div>
                            
                           
                           

                            <!-- /.box-body -->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">提交</button>
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

 @stop