@extends('layouts.admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                权限编辑
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">权限编辑</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
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
                        <form class="form-horizontal" action="{{ url('/admin/permission/'.$per->id) }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">角色名称 :</label>

                                    <div class="col-sm-10">
                                        <input name="name" value="{{ $per -> name }}" type="text" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">角色描述 :</label>

                                    <div class="col-sm-10">
                                        <input name="description" value="{{ $per -> description }}" type="textd" class="form-control" id="inputPassword3">
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