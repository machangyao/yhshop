@extends('layouts.home.user_layout')
@section('content')
<link href="/yh/home/css/addstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/yh/home/js/jquery.provincesCity.js"></script>
<script type="text/javascript" src="/yh/home/js/provincesData.js"></script>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="user-address">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
				</div>
				<hr/>
				<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
					@foreach ($addr as $k=>$v)
						@if ($v->addr_status == 1 )
					<li class="user-addresslist defaultAddr">
						@else
							<li class="user-addresslist">
								@endif

							<span class="new-option-r" id="da" onclick="da({{$v->id}})"><i class="am-icon-check-circle"></i>默认地址</span>
						<p class="new-tit new-p-re">
							<span class="new-txt">{{$v->addr_name}}</span>
							<span class="new-txt-rd2">{{$v->addr_tel}}</span>
						</p>
						<div class="new-mu_l2a new-p-re">
							<p class="new-mu_l2cw">
								<span class="title">地址：</span>
								<span class="province">{{$v->addr}}</span>
								<span class="province">{{$v->addrdetail}}</span>
								
						</div>
						<div class="new-addr-btn">
							<a href="{{url('/user/addr')}}/{{$v->id}}"><i class="am-icon-edit"></i>编辑</a>
							<span class="new-addr-bar">|</span>
							<a href="javascript: void(0)" class='del' Common="{{$v->id}}"><i class="am-icon-trash"></i>删除</a>
						</div>

					</li>
					@endforeach
				</ul>
				<div class="clear"></div>
				<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
				<!--例子-->
				<div class="am-modal am-modal-no-btn" id="doc-modal-1">

					<div class="add-dress">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
						</div>
						<hr/>
						@if (count($errors) > 0)
						    <div class="alert alert-danger" >
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
							<form id='form' class="am-form am-form-horizontal" action="{{url('/user/addr/')}}" method='post'>
							{{csrf_field()}}
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">收货人</label>
									<div class="am-form-content">
										<input type="text" id="name" placeholder="收货人" name='addr_name'>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">手机号码</label>
									<div class="am-form-content">
										<input id="tel" placeholder="手机号必填" type="email" name='addr_tel'>
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-address" class="am-form-label">所在地</label>
									<div class="am-form-content address">
										<select id='s' >
											@foreach ($sheng as $v)
											<option value="{{$v->id}}">{{$v->Name}}</option>
											@endforeach
										</select>
										<select id='shi' >
											<option value="{{$shi['id']}}">{{$shi['Name']}}</option>
										</select>
										<select id='qu' name='qu'>
											@foreach ($qu as $v)
											<option value="{{$v->id}}">{{$v->Name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<!-- <div id="province"></div> -->
								<div class="am-form-group">
									<label for="user-intro" class="am-form-label">详细地址</label>
									<div class="am-form-content">
										<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name='addrdetail'></textarea>
										<small>100字以内写出你的详细地址...</small>
									</div>
								</div>

								<div class="am-form-group">
									<div class="am-u-sm-9 am-u-sm-push-3">
										<a class="am-btn am-btn-danger" id='submit'>保存</a>
										<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
									</div>
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>

			<script type="text/javascript">
				$(document).ready(function() {							
					$(".new-option-r").click(function() {
						$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
					});
					
					var $ww = $(window).width();
					if($ww>640) {
						$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
					}
					
				});

				$(function(){
  					$("#province").ProvinceCity();
  				});

				$('#s').on('change',function(){
					var val = $(this).val();
					$.ajax({
						url:"{{url('/city/ajax')}}",
						type:'post',
						data:{'val':val,'_token':'{{ csrf_token()}}'},
						success:function(data){
							$("#shi").empty();
							$("#qu").empty();
							$.each(data['shi'],function(k,v){
								var op = $('<option value='+v.id+'>'+v.Name+'</option>');
								$("#shi").append(op);
							});
							$.each(data['qu'],function(k,v){
								var op = $('<option value='+v.id+'>'+v.Name+'</option>');
								$("#qu").append(op);
							});
						}
					});
				});
					$('#shi').on('change',function(){
					var val = $(this).val();
					$.ajax({
						url:"{{url('/city/ajax')}}",
						type:'post',
						data:{'val':val,'_token':'{{ csrf_token()}}'},
						success:function(data){
							$("#qu").empty();
							$.each(data['shi'],function(k,v){
								var op = $('<option value='+v.id+'>'+v.Name+'</option>');
								$("#qu").append(op);
							});
						}
					});
				});

				$('#submit').on('click',function(){
					$('#form').submit();
				});

				$('.del').on('click',function(){
					var id = $(this).attr('Common');
					$.ajax({
						url:"{{url('/user/addr')}}/"+id,
						type:'post',
						data:{'_token':'{{csrf_token()}}','_method':'delete','id':id},
						success:function(){
							 location.reload();
						}
					});

				});
				function da(id) {
                    $.ajax({
                        url:"{{url('/addr/status')}}",
						type:'post',
						data:{'id':id,'_token':"{{csrf_token()}}"},
						success:function (data) {
							// alert(data);
                        }
                    });
                }
					
			</script>

			<div class="clear"></div>

		</div>

@stop