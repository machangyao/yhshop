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
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">列表</li>
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
                            <form action="{{ url('/admin/user') }}" method="get">
                            	<div class="row">
                            		<div class="col-md-2">
                            		      
                            		</div>
                            		<div class="col-md-4">
                            				
                            			
                            		</div>
                            		<div class="col-md-4">
                            			
					<div class="input-group input-group">
	                                		
	                                		<span class="input-group-btn">
	                      				<button class="btn btn-info btn-flat">搜索一下!</button>
	                    			</span>
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
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                            
                                </tbody>

                            </table>

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
@stop

@section('js')
	<script type="text/javascript">
	//添加事件
	$(".name").on('dblclick', cname);

	//封装
	function cname(){
		var td = $(this);
		//创建input标签
		var inp = $('<input type="text">');

		//获取原来的值
		var oldValue = $(this).html();

		//将原来的值放入inp
		inp.val(oldValue);

		//将inp放入td
		$(this).html(inp);

		//自动添加焦点
		inp.select();

		//删除事件
		td.unbind('dblclick');

		//获取id
		var id = $(this).prev().html();

		//添加失去焦点事件
		inp.on('blur',function(){
			//获取新名称
			var newname = $(this).val();

			$.ajax({
			url:'{{ url("/admin/user/ajax/changename") }}',
			type: 'post',
			data: {id:id, name:newname},
			success: function(data)
			{
				if(data.status == 1)
				{
					td.html(newname);
				}else
				{
					td.html(oldValue);
				}
			},
			dataType: 'json'
			});

			//添加事件
			td.on('dblclick',cname);
		});
		
	}
	</script>

@stop