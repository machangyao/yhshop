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
							<br>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID编号</th>
                                    <th>名称</th>
                                    <th>网址</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($data)
                                    @foreach($data as $v)
                                    <tr>
                                        <td>{{ $v->id }}</td>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->url }}</td>
                                        <td>{{ $v->created_at }}</td>
                                        <td> <a href="{{ url('brand/'.$v->id.'/edit') }}">修改</a> <a href="javascript:;" onclick="del({{ $v->id }})">删除</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align:center;" colspan="11">暂无品牌信息</td>
                                    </tr>
                                @endif
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
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //ajax
                $.ajax({
                    url:'{{ url('/brand') }}/'+id,
                    data:{'_method':'delete','_token':'{{ csrf_token() }}'},
                    type:'post',
                    success:function(data){
                        if(data.status == 1)
                        {
                            layer.msg(data.message, {icon: 6});
                            window.location.href = location.href;
                        }else{
                            layer.msg(data.message, {icon: 5});
                            window.location.href = location.href;
                        }
                    }
                }); 

            });

        }
</script>
@stop