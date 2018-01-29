@extends('layouts.admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li>管理员: {{ session('user')->nickname }}</li>
                <li><a href="#">修改密码</a></li>
                <li><a href="{{ url('admin/logout') }}">退出</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">可以快速的添加一个用户</h3>
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
                        <form class="form-horizontal" action="{{ url('/admin/user/doauth') }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                          <table align="center" width="500">
                              <tr>
                                  <th>用户名:</th>
                                  <td>
                                        {{ $user -> nickname }}
                                        <input type="hidden" name="id['id']" value="{{ $user->id }}">
                                  </td>
                              </tr>
                              <tr>
                                  <th>角色列表:</th>
                                  <td>
                                      @foreach($roles as $v)
                                      <!-- 如果当前遍历的角色在当前用户拥有的角色列表中,复选框应该加选中状态 -->
                                      @if(in_array($v->id,$own))
                                            <label for=""><input type="checkbox" name="id['role'][]" checked value="{{ $v->id }}">{{ $v->name }}</label>
                                       @else
                                            <label for=""><input type="checkbox" name="id['role'][]" value="{{ $v->id }}">{{ $v->name }}</label>
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