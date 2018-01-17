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
                编辑网站配置信息
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">编辑网站配置信息</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">网站信息</h3>
                        </div>
                        <!-- /.box-header -->
                        <form role="form" action="{{ url('/admin/site') }}" method="post">
                        {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>网站关键字</label>
                                    <input type="text" class="form-control" name="site_keyword" value="{{ $site->site_keyword }}">
                                </div>

                                <div class="form-group">
                                    <label>网站描述</label>
                                    <textarea class="form-control" rows="3" name="site_describe" value="">{{ $site->site_describe }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>网站版权声明</label>
                                    <input type="text" class="form-control" name="site_copyright" value="{{ $site->site_copyright }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">网站logo图</label><br>
                                    <img src=" /{{ $site->site_logo }} " alt="">
                                    
                                    <input type="file" id="exampleInputFile">
                                </div>

                                    
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                        <!-- /.box-body -->
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
