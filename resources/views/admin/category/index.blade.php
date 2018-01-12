@extends('layouts.admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ session('info') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
						
							<form action="/category" method="get">
								<div class="row">
									<div class="col-xs-8"></div>
									<div class="col-xs-4">
										<div class="input-group input-group">
			                                  <input type="text" name="keyword" value="{{ $where['keyword'] }}" class="form-control" placeholder="请输入搜索条件">
			                                  <span class="input-group-btn">
						                      <button class="btn btn-info btn-flat">搜索</button>
						                    </span>
						                </div>
									</div>
								</div>
							</form>
							<br>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID编号</th>
                                    <th>分类名称</th>
                                    <th>父ID</th>
                                    <th>Path路径</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->pid }}</td>
                                    <td>{{ $v->path }}</td>
                                    <td><a href="">添加子分类</a> <a href="{{ url('/category/') }}/{{ $v->id }}/edit">修改</a> <a href="javascript:;" onclick="del({{ $v->id }})">删除</a></td>
                                </tr>
                                @endforeach
                                </tfoot>
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
    <script type="text/javascript">
        function del(id)
        {
            $.ajax({
                url:'{{ url('/category/') }}/'+id,
                data:{'_method':'delete','_token':'{{ csrf_token() }}'},
                type:'post',
                success:function(data){
                    if(data.status == 1)
                    {
                        window.location.href = location.href;
                    }
                }
            });
        }
    </script>
@stop