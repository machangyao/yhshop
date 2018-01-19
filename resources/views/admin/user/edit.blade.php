@extends('layouts.admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
            </h1>
            <ol class="breadcrumb">
                <li>管理员: {{ session('user') }}</li>
                <li><a href="#">修改密码</a></li>
                <li><a href="{{ url('admin/logout') }}">退出</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            @if(session('msg'))
                            <h3 class="box-title">{{ session('msg') }}</h3>
                            @endif
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
                        <form class="form-horizontal" action="{{ url('/admin/user/'. $user->id) }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户名 :</label>

                                    <div class="col-sm-10">
                                        <input name="nickname" type="text" value="{{ $user->nickname }}" class="form-control" id="inputEmail3" placeholder="请输入用户名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">邮箱 :</label>

                                    <div class="col-sm-10">
                                        <input name="email" type="email" value="{{ $user->email }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入邮箱">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">手机号 :</label>

                                    <div class="col-sm-10">
                                        <input name="tel" type="text" value="{{ $user->tel }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入手机号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">头像 :</label>

                                    <div class="col-sm-10">
                                        <input name="avatar" value="{{ $user->avatar }}" type="file" id="inputPassword3"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">

                            <div class="form-group">
                            	<div class="col-md-2"></div>
                            	<div class="col-sm-10">
                                        <button type="submit" class="btn btn-default">提交</button>
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