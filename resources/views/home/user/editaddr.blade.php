@extends('layouts.home.user_layout')
@section('content')
<link href="/yh/home/css/addstyle.css" rel="stylesheet" type="text/css">
<div class="center">
<div class="col-main">
<div class="main-wrap">

	<div class="user-address">
		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg"></strong><small>&nbsp;</small></div>
		</div>
		<hr/>

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

				<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
					<form action="{{url('/user/addr')}}/{{$addr->id}}" method="post" class="am-form am-form-horizontal">
					{{csrf_field()}}
					{{method_field('put')}}
						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人" value="{{$addr->addr_name}}" name='addr_name'>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email" value="{{$addr->addr_tel}}" name='addr_tel'>
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

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name='addrdetail'>{{$addr->addrdetail}}</textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<a class="am-btn am-btn-danger" id='submit'>保存</a>
								<a href="{{url('/user/addr')}}" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
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
			$('form').submit();
		});
	</script>

	<div class="clear"></div>

</div>
@stop