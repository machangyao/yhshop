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
                轮播图
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">轮播图</li>
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

                        <div class="box-body">
                        <div class="col-xs-9"></div>
                            <div class="col-xs-3">
                            <form action="{{url('admin/slide')}}" method="get">
                                <table>
                             <tr>
                             <td>
                                <input type="text" name="keywords1" value="{{$request->keywords1}}" class="form-control" placeholder="输入文字描述搜索条件">
                                </td><td>
                                <span class="input-group-btn">
                                 <button class="btn btn-info btn-flat">搜索</button>
                                </span>
                                </td>
                                </tr>
                                </table>
                            </form>
                            </div>
                        </div>
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"> 
                                <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 163px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 202px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图链接</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 178px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图片</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 139px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文字描述</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th></tr>
                                </thead>
                                <tbody>
                                @foreach($slide as $v)

                                    <tr role="row" class="odd">
                                    <td width="7%" class="sorting_1"><font style="vertical-align: inherit;">{{ $v->slide_id }}</font></td>
                                    <td ><font style="vertical-align: inherit;">{{ $v->slide_url }}</font></td>

                                    <td width="10%">
                                    <img class="img" height="50" width="50" src="{{$v->slide_mig}}">
                                    </td>

                                    <td ><font style="vertical-align: inherit;">{{ $v->slide_text }}</font></td>

                                    
                                    <td><font style="vertical-align: inherit;"><a href=" {{ url('admin/slide/'.$v->slide_id.'/edit') }} ">编辑</a> | <a href="javascript:;" onclick="delSlide({{ $v->slide_id }})">删除</a></font> |  
                                    @if( $v->state == '0') <a href="javascript:;" onclick="stateSlide({{ $v->slide_id }})" class="state">上传</a> 
                                    @else( $v->state == '1') <a href="javascript:;"  onclick="stateSlide({{ $v->slide_id }})" class="state">下架</a>
                                    @endif
                                    </td>
                                    
                                </tr>

                            @endforeach
                                    
                           </tbody>

                        </table>    
                         <div class="page_list">
                            {!! $slide->appends($request->all())->render() !!}
                        </div>
        </section>
        <!-- /.content --> 
    </div>

    <script>

    function delSlide(id){
        layer.confirm('您确定要删除吗？',{
            btn:['确定','取消']
        }, function(){
            //向服务器发送ajax请求，删除当前id对应的用户数据
            //$.post('请求的路由','携带的参数','处理成功后的返回结果')
        $.post('{{ url('admin/slide/') }}/'+id,{'_method':'delete','_token':"{{ csrf_token() }}"},function (data){
            if(data.status == 0){
                layer.msg(data.message,{icon:6});
                setTimeout(function(){
                    window.location.href = location.href;
                },1000);
            }else{
                layer.msg(data.message,{icon:5});
                 setTimeout(function(){
                     window.location.href = location.href;
                        },1000);

                    }
                })
            },function(){});
        }

        function  stateSlide(){
           
            // $.ajax({
            //     type: "get",
            //     url: "/admin/slide/state",
            //     data: formData,
            //     async: true,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     success: function(data) {
            //        console.log(data);
            //     },
            //     error: function(XMLHttpRequest, textStatus, errorThrown) {
            //         alert("上传失败，请检查网络后重试");
            //     }
            // });
        }


    </script>
@stop