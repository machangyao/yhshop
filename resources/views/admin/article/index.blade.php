@extends('layouts.admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                文章管理
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">文章管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">文章</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
							<br>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID编号</th>
                                    <th>作者</th>
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($article as $v)
                                <tr>
                                    <td>{{ $v->article_id }}</td>
                                    <td>{{ $v->article_author }}</td>
                                    <td>{{ $v->article_title }}</td>
                                    <td>{{ $v->article_content }}</td>
                                    <td> <a href="">修改</a> <a href="javascript:;">删除</a></td>
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
@stop