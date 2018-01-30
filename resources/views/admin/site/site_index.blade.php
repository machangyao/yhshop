@extends('layouts.admin.layout')

 @section('content')
 <style type="text/css">
    .form-group{ margin-bottom: 0;}
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                网站配置信息
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">网站配置信息</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">网站信息</h3>
                        </div>



                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">




                            <div class="row"><div class="col-sm-12">

                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"> 

                                <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 163px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 202px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">关键字</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 178px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站描述</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 139px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">版权声明</font></font></th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站logo</font></font></th><th>操作</th></tr>
                                </thead>



                                <tbody>

								@foreach($site as $v)
                                    <tr role="row" class="odd">
                                    <td width="7%" class="sorting_1"><font style="vertical-align: inherit;">{{ $v->site_id }}</font></td>
                                    <td ><font style="vertical-align: inherit;">{{ $v->site_keyword }}</font></td>
                                    <td><font style="vertical-align: inherit;">{{ $v->site_describe }}</font></td>
                                    <td ><font style="vertical-align: inherit;">{{ $v->site_copyright }}</font></td>

                                    <td><font style="vertical-align: inherit;"><img style='width: 100px' src="/uploads/{{ $v->site_logo }}" alt=""></font></td>
                                    <td><a href="{{url('/admin/site/edit')}}?id={{$v->site_id}}">修改</a></td>
                                    </tr>
							    @endforeach

									
                           </tbody>

                            </table>
                            </div>

	                           </div>
                            </div>
                        </div>
                    

                       <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div> 


@stop