@extends('layouts.admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                支付管理
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


                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ url('admin/pay') }}" method="get">
                                关键字:
                                <input type="text" name="keywords" value="{{ $request->keywords }}" placeholder="关键字">
                                <input type="submit"  value="查询">
                            </form>
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th>订单Id</th>
                                    <th>支付方式</th>
                                    <th>支付金额</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                @foreach($pay as $v)
                                <tr>
                                    <td>{{ $v->pid }}</td>
                                    <td>{{ $v->pay_way }}</td>
                                    <td>{{ $v->pay_price }}元</td>
                                    <td><a href="javascript:;" onclick="del({{ $v->pid }})">删除</a></td>
                                </tr>
                                @endforeach
                            </table>
                            {!! $pay->appends($request->all())->render() !!}
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
                $.get('{{ url('admin/pay/') }}/'+id,
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