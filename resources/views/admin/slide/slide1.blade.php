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
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示 </font></font><select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></option><option value="25"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25</font></font></option><option value="50"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></option><option value="100"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></option></select><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 项</font></font></label></div></div><div class="col-sm-4"><div id="example1_filter" class="dataTables_filter"><label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索：</font></font><input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div><div class="col-sm-2"><a href="/admin/slide/create">添加轮播图</a></div></div>



                            <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"> 
                                <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 163px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 202px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图链接</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 178px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图片</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 139px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文字描述</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建时间</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th></tr>
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
                                    <td><font style="vertical-align: inherit;">{{ $v->create_at }}</font></td>
                                    <td><font style="vertical-align: inherit;"><a href=" {{ url('admin/slide/'.$v->slide_id.'/edit') }} ">编辑</a> | <a href="javascript:;" onclick="delSlide({{ $v->slide_id }})">删除</a></font></td>

                                </tr>

							@endforeach
									
                           </tbody>

                            </table>
                            </div>
	                        </div>

		                     <div class="row">
			                           <div class="col-sm-5">
			                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示57个条目中的1至10个</font></font>

	                            </div>
                            </div>



                            <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">以前</font></font></a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下一个</font></font></a></li></ul></div></div></div></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
</div>
         <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
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
    

    </script>
@stop