@extends('layouts.admin.layout')

@section('content')

     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li>管理员: {{ session('user') }}</li>
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
                            <h3 class="box-title">系统基本信息</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td style="width:130px">操作系统</td>
                                    <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">运行环境</td>
                                    <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">PHP运行方式</td>
                                    <td>www.baidu.com</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">静静设计-版本</td>
                                    <td>v-0.1</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">上传附件限制</td>
                                    <td><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"; ?></td>
                                </tr>
                                <tr>
                                    <td style="width:100px">北京时间</td>
                                    <td>{{ date('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">服务器域名/IP</td>
                                    <td>{{ $_SERVER['SERVER_NAME'] }} [ {{ $_SERVER['SERVER_ADDR'] }} ]</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Host</td>
                                    <td>{{ $_SERVER['SERVER_ADDR'] }}</td>
                                </tr>
                                
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-header">
                            <h3 class="box-title">使用帮助</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td style="width:130px">官方交流网站</td>
                                    <td><a href="#">http://yhshop196.com</a></td>
                                </tr>
                                <tr>
                                    <td style="width:100px">官方交流QQ群</td>
                                    <td><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></td>
                                </tr>
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
