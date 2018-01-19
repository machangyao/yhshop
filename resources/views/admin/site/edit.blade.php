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


                        <form role="form" action="{{ url('/admin/site') }}" method="post" id="form_upload"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-sm-5">
                                    <label>网站关键字</label>
                                    <input type="text" class="form-control" name="site_keyword" value="{{ $site->site_keyword }}">
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="col-sm-5">
                                    <label>网站描述</label>
                                    <textarea class="form-control" rows="3" name="site_describe" value="">{{ $site->site_describe }}</textarea>
                                </div>
                            </div>

                            <div class="box-body">    
                                <div class="col-sm-5">
                                    <label>网站版权声明</label>
                                    <input type="text" class="form-control" name="site_copyright" value="{{ $site->site_copyright }}">
                                </div>
                            </div>

                            <div class="box-body">    
                                <div class="form-group">
                                    <label for="exampleInputFile">网站logo图</label><br>
                                    <img src=" {{ $site->site_logo }} ">
                                    
                                    <input type="file" name="site_logo" value="{{ $site->site_logo }}" id="exampleInputFile">
                                </div>
                            
                                    
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>

                    <script type="text/javascript">
                        $("#file_upload").change(function () {
                                uploadImage();
                            });
                        function uploadImage() {
                            //判断是否有选择上传文件
                            var imgPath = $("#file_upload").val();
                            if (imgPath == "") {
                                alert("请选择上传图片！");
                                return;
                            }
                            //判断上传文件的后缀名
                            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                            if (strExtension != 'jpg' && strExtension != 'gif' && strExtension != 'png' && strExtension != 'bmp' && strExtension == '') {
                                alert("请选择图片文件");
                                return;
                            }
                        }
                    </script>
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
