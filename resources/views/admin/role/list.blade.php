@extends("layouts.admin.layout")

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li>管理员: {{ session('user')->nickname }}</li>
                <li><a href="#">修改密码</a></li>
                <li><a href="{{ url('admin/logout') }}">退出</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
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
                            			
				<div class="input-group input-group">
	                      				
	                    			
                            		</div>
			
                            		</div>
                            	</div>
			</form>
			<thead>
                                <tr>
                                    <th>ID</th>
                                    <th>角色名称</th>
                                    <th>角色描述</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $k=>$v)
                                    <tr>
                                        <td>{{ $v->id }}</td>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->description}}</td>
                                        <td><a href="{{ url('admin/role/' .$v->id.' /edit') }}">编辑 </a>
                                                <a href="{{ url('admin/role/auth/' .$v->id) }}">授权 </a>
                                                <a href="javascript:;" onclick="delRole({{ $v->id }})"> 删除</a> 
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                                      

                            </table>
                                
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->



    </script>
                    
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
    function delRole(id){
        layer.confirm('您确定要删除吗？',{
            btn:['确定','取消']
        }, function(){
            //向服务器发送ajax请求，删除当前id对应的用户数据
            //$.post('请求的路由','携带的参数','处理成功后的返回结果')
        $.post('{{ url('admin/role/') }}/'+id,{'_method':'delete','_token':"{{ csrf_token() }}"},function (data){
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


	

