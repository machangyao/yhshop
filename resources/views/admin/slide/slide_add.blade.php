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
                添加轮播图
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">添加轮播图</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">轮播图</h3>
                        </div>

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



                        <form role="form" action="{{ url('admin/slide') }}" method="post"  id="form_upload"  enctype="multipart/form-data">

                        {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图链接</font></font></label>
                                    <input type="text" class="form-control" name="slide_url" placeholder="输入URL地址">
                                </div>
                            </div>
                            
                            <div class="box-body">    
                                <div class="col-sm-4">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图文字描述</font></font></label>
                                    <textarea class="form-control" rows="3" name="slide_text" placeholder="简单描述"></textarea>
                                </div>
                                </div>
                            
                            <div class="box-body"> 
                                <div class="form-group">
                                    <label for="exampleInputFile">轮播图图片</label>

                                   
                                    <input id="file_upload" name="slide_mig" type="file" multiple="true">
                                           <br>
                                           <img src="" alt="" id="file_upload_img" style="max-width: 350px; max-height:100px;">
                                                     

                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>


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


                            //只将文件上传表单项的内容放入formData对象
                                var formData = new FormData();
                                formData.append('file_upload', $('#file_upload')[0].files[0]);
                                formData.append('_token', '{{csrf_token()}}');

                                $.ajax({
                                    type: "POST",
                                    url: "/admin/slide/upload",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
//                                        alert()
                                        $('#file_upload_img').attr('src',data);
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                        }



                    </script>
                        
                 

                </form>
        </div>

</div>


  </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div> 


@stop