@extends('layouts.admin.layout')

 @section('content')

<div class="content-wrapper" style="min-height: 871px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加友情链接
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
                <li class="active">添加友情连接</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="">
            <div class="row" style="">
                <!-- right column -->
                <div class="col-md-12" style="">
                    <!-- Horizontal Form -->
                    <div class="box box-info" style="">
                        <div class="box-header with-border">
                                                    </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="/good" method="post" class="form-horizontal" enctype="multipart/form-data" style="">   
                            <input type="hidden" name="_token" value="puKbNZFAypjJZKBSfJhWHyDs2oacijXTGSzbM2oi">
                            <div class="box-body">
                                
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情链接地址</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入商品名称">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情连接文字描述</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="price" class="form-control" id="inputEmail3" placeholder="请输入商品价格">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">友情连接创建时间</label>

                                    <div class="col-sm-2">
                                        <input type="text" name="market_price" class="form-control" id="inputEmail3" placeholder="请输入商品市场价格">
                                    </div>
                                </div>
                            </div>
                            
                           
                           

                            <!-- /.box-body -->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">添加</button>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <!-- /.box-footer -->
                        </form>
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