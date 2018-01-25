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

                        <div class="col-xs-8"></div>

                        <div class></div> 
							<form action="{{url('admin/article')}}" method="get">
                                <table>
                                 <tr>
                                 <td>
                                    
                                    <input class="form-control" type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="作者">
                                    </td><td>
                                    <input class="form-control" type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="标题">
                                    </td><td>
                                    <span class="input-group-btn">
                                     <button class="btn btn-info btn-flat">搜索</button>
                                    </span>
                                    </td>
                                    </tr>
                                </table>

                            </form>


                            

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

                                    <td>
                                    <a href="javascript:;" onclick="view({{ $v->article_id }})">点击查看</a>    
                                    <div id="nr" style="display:none;">{!! $v->article_content !!}</div>
                                    </td>

                                    <td> <a href="{{ url('admin/article/'.$v->article_id.'/edit') }}">修改</a> <a href="javascript:;" onclick="delArticle({{ $v->article_id }})">删除</a></td>
                                </tr>
                                @endforeach
                                </tfoot>
                            </table>
                            <div class="page_list">
                                {!! $article->appends($request->all())->render() !!}
                            </div>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </section>
                </div>
                            

    <!-- /.content-wrapper -->


    <script>
    function delArticle(id){
        layer.confirm('您确定要删除吗？',{
            btn:['确定','取消']
        }, function(){
            //向服务器发送ajax请求，删除当前id对应的用户数据
            //$.post('请求的路由','携带的参数','处理成功后的返回结果')
        $.post('{{ url('admin/article/') }}/'+id,{'_method':'delete','_token':"{{ csrf_token() }}"},function (data){
            if(data.status == 0){
                layer.msg(data.message,{icon:6});
                setTimeout(function(){
                    window.location.href = location.href;
                },1000);
            }else{
                layer.msg(data.message,{icon:5});
                 setTimeout(function(){
                     window.location.href = location.href;
                        },1000);
                    }
                })
            },function(){});
        }

    function view(id){
        $.get('{{ url('admin/article/') }}/'+id,{'_method':'delete','_token':"{{ csrf_token() }}"},function (data){
                data = '<table>'+data['article_content']+'</table>';
                layer.open({
                  type: 1,
                  skin: 'layui-layer-rim', //加上边框
                  area: ['720px', '540px'], //宽高
                  content: data
                });
        });

        
    }    
    </script>
    

@stop