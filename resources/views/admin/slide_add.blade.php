 @extends('layouts.admin.layout')

 @section('content')
<div class="content-wrapper">
<div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加轮播图</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图链接</font></font></label>
                                    <input type="text" class="form-control" placeholder="输入URL地址">
                                </div>
                                <div class="form-group">
                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图文字描述</font></font></label>
                                    <textarea class="form-control" rows="3" placeholder="简单描述"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">轮播图图片</label>
                                    <input type="file" id="exampleInputFile">

                                    
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div>

</div>


@stop