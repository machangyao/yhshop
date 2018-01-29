@extends('layouts.admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                角色授权
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">角色授权</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @if(is_object($errors))
                                            @foreach ($errors->all() as $error)
                                                <li style="color:red">{{ $error }}</li>
                                            @endforeach
                                        @else
                                            <li style="color:red">{{ $errors }}</li>
                                        @endif
                                    </ul>
                                </div>
                         @endif
                        <form class="form-horizontal" action="{{ url('/admin/role/doauth') }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                          <table align="center" width="500">
                              <tr>
                                  <th>角色名:</th>
                                  <td>
                                        {{ $role -> name }}
                                        <input type="hidden" name="id" value="{{ $role->id }}">
                                  </td>
                              </tr>
                              <tr>
                                  <th>权限列表:</th>
                                  <td>
                                      @foreach($pers as $v)
                                      <!-- 如果当前遍历的角色在当前用户拥有的角色列表中,复选框应该加选中状态 -->
                                      @if(in_array($v->id,$own))
                                            <label for=""><input type="checkbox" name="permission_id[]" checked value="{{ $v->id }}">{{ $v->name }}</label>
                                       @else
                                            <label for=""><input type="checkbox" name="permission_id[]" value="{{ $v->id }}">{{ $v->name }}</label>
                                        @endif
                                       @endforeach
                                  </td>
                              </tr>
                              <tr>
                                  <th></th>
                                  <td>
                                      <input type="submit" value="提交">
                                  </td>
                              </tr>
                          </table>
                          
                            <!-- /.box-body -->
                            
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                    <!-- general form elements disabled -->
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop