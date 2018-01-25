 @extends('layouts.admin.layout')

 @section('content')

<div class="content-wrapper" style="min-height: 871px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑广告
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">编辑广告</li>
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

                            <form action="{{ url('admin/ads/'.$ads->ads_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_upload"  enctype="multipart/form-data">   
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">广告链接</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="ads_url" class="form-control" id="inputEmail3" placeholder="请输入链接" value="{{ $ads->ads_url }}">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">广告文字</label>

                                    <div class="col-sm-4">
                                       
                                       <textarea class="form-control" rows="3" name="ads_text" placeholder="简单描述">{{ $ads->ads_text }}</textarea>
                                    </div>
                                </div>
                            </div>

                             <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">广告图片</label>

                                    <div class="col-sm-4">
                                        <input type="file" name="ads_img" value="{{ $ads->ads_img }}" id="inputEmail3" placeholder="请上传商品图片">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">广告存在时间</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="ads_time" class="form-control" id="inputEmail3" value="{{ $ads->ads_time }}" placeholder="请输入时间">
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


                            <script type="text/javascript">
                                $("#file_upload").change(function () {
                                    uploadImage();
                                    });
                                function uploadImage() {
                                    // alert('')判断是否有选择上传文件
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
                    </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
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