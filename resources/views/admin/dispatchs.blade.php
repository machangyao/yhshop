@extends('layouts.admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                配送管理
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
                            <form action="{{ url('admin/pay') }}" method="get">
                                关键字:
                                <input type="text" name="keywords" value="{{ $request->keywords }}" placeholder="关键字">
                                <input type="submit"  value="查询">
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>配送单号</th>
                                    <th>配送地址</th>
                                    <th>配送时间</th>
                                    <th>配送人员</th>
                                    <th>配送人电话</th>
                                </tr>
                                </thead>
                                @foreach($dis as $v)
                                <tr>
                                    <td>{{ $v->did }}</td>
                                    <td>{{ $v->dis_site }}</td>
                                    <td>{{ $v->dis_time }}</td>
                                    <td>{{ $v->dis_person }}</td>
                                    <td>{{ $v->dis_tel }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    {!! $dis->appends($request->all())->render() !!}
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