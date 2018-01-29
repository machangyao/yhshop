@extends("layouts.admin.layout")

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户列表
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">用户列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                           
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">

                            <form action="{{ url('/admin/user') }}" method="get" >

                            	<div class="row">
                            		<div class="col-md-2">
                            		      
                            		</div>
                            		<div class="col-md-6">
                            				
                            			
                            		</div>
                            		<div class="col-md-4">
                            			<input type="text"  name="keywords" value="{{ $input }}" class="form-control">
                                                                <button class="btn btn-info btn-flat">查询</button>
				<div class="input-group input-group">
	                      				
	                    			
                            		</div>
			
                            		</div>
                            	</div>
			</form>
			<thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>头像</th>
                                    <th>手机号</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{ $v->id }}</td>
                                        <td>{{ $v->nickname }}</td>
                                        <td>{{ $v->email }}</td>

                                        <td><img width="60" src="/uploads/{{ $v->avatar }}"></td>
                                        <td>{{ $v->tel }}</td>
                                        <td><a href="{{ url('admin/user/' .$v->id.' /edit') }}">编辑 </a>
                                                <a href="{{ url('admin/user/auth/' .$v->id) }}">授权 </a>
                                                <a href="javascript:;" onclick="delUser({{ $v->id }})"> 删除</a> 

                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                                      

                            </table>
                                      {!! $data->appends(['keywords'=>$input])->render() !!}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->



                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
    function delUser(id){
        layer.confirm('您确定要删除吗？',{
            btn:['确定','取消']
        }, function(){
            //向服务器发送ajax请求，删除当前id对应的用户数据
            //$.post('请求的路由','携带的参数','处理成功后的返回结果')
        $.post('{{ url('admin/user/') }}/'+id,{'_method':'delete','_token':"{{ csrf_token() }}"},function (data){
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


	


