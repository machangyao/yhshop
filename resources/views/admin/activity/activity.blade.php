@extends('layouts.admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品活动
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> a></li>Home</
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form action="{{ url('admin/activity') }}" method="get">
                        关键字:
                        <input type="text" name="keywords" value="{{ $request->keywords }}" placeholder="关键字">
                        <input type="submit"  value="查询">
                    </form>

                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>活动ID</th>
                                    <th>活动开始时间</th>
                                    <th>活动结束时间</th>
                                    <th>商品类型</th>
                                    <th>商品图片</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                @foreach($act as $v)
                                <tr>
                                    <td>{{ $v->aid }}</td>
                                    <td>{{ $v->start_time }}</td>
                                    <td>{{ $v->end_time }}</td>
                                    <td>{{ $v->act_type }}</td>
                                    <td><img width='50' height='50' src="{{ $v->act_image }}" alt=""></td>
                                    <td><a href=""></a><a href="javascript:;" onclick="del({{ $v->aid }})">删除</a></td>
                                </tr>
                                @endforeach
                            </table>
                            {!! $act->appends($request->all())->render() !!}
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
        function del(id){
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post('{{ url('admin/activity/') }}/'+id,
                    {'_method':'delete','_token':"{{csrf_token()}}"},
                    function (data) {
                        if(data.status == 0){
                            layer.msg(data.message, {icon: 6});
                            setTimeout(function(){
                                window.location.href = location.href;
                            },1000);
                        }else{
                            layer.msg(data.message, {icon: 5});

                            window.location.href = location.href;
                        }

                    })

//
            }, function(){

            });
        }
    </script>
@stop