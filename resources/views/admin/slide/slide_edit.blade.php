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
                编辑轮播图
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">编辑轮播图</li>
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



                        <form role="form" action="{{ url('admin/slide/'.$slide->slide_id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图链接</font></font></label>
                                    <input type="text" class="form-control" name="slide_url" value="{{ $slide->slide_url }}" >
                                </div>
                                <div class="form-group">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图文字描述</font></font></label>
                                    <textarea class="form-control" rows="3" name="slide_text" >{{ $slide->slide_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">轮播图图片</label>
                                    <input type="file" name="slide_mig" id="exampleInputFile">

                                    
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
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