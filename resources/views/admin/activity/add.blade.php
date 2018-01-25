@extends('layouts.admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品活动管理
                <small>添加</small>
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
                            <h3 class="box-title">添加活动商品</h3>
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
                        <form class="form-horizontal" action="{{ url('/admin/activity') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">活动开始时间:</label>

                                    <div class="col-sm-10">
                                        <input name="start_time" type="text" class="form-control" id="inputEmail3" placeholder="年-月-日">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">活动结束时间:</label>

                                    <div class="col-sm-10">
                                        <input name="end_time" type="text" class="form-control" id="inputPassword3"
                                               placeholder="年-月-日">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">活动类型:</label>

                                    <div class="col-sm-10">
                                        <input name="act_type" type="text" class="form-control" id="inputPassword3"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">选择商品图片 :</label>

                                    <div class="col-sm-10">
                                        <input name="act_image" type="file" id="inputPassword3"
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