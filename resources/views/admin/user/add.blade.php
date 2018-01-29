@extends('layouts.admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加用户
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">添加用户</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if (count($errors) > 0)
                                <div class="alert alert-danger">
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
                        <form class="form-horizontal" action="{{ url('/admin/user') }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户名 :</label>

                                    <div class="col-sm-10">
                                        <input name="nickname" type="text" class="form-control" id="inputEmail3" placeholder="请输入用户名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">密码 :</label>

                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control" id="inputPassword3"
                                               placeholder="请输入密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">确认密码 :</label>

                                    <div class="col-sm-10">
                                        <input name="re-password" type="password" class="form-control" id="inputPassword3"
                                               placeholder="请输入确认密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">邮箱 :</label>

                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control" id="inputPassword3"
                                               placeholder="请输入邮箱">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">手机号 :</label>

                                    <div class="col-sm-10">
                                        <input name="tel" type="text" class="form-control" id="inputPassword3"
                                               placeholder="请输入手机号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">头像 :</label>

                                    <div class="col-sm-10">
                                        <input name="avatar" type="file" id="inputPassword3"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">

                            <div class="form-group">
                            	<div class="col-md-2"></div>
                            	<div class="col-sm-10">
                                        <button type="submit" class="btn btn-default">添加</button>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                    <!-- general form elements disabled -->
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