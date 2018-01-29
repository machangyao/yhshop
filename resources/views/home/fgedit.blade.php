<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>忘记密码</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/yh/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/yh/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/yh/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/yh/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			@foreach($site as $v)
				
				<div class="logoBig">
					<li><img src="{{ $v->site_logo }}" /></li>
				</div>
				@endforeach

		</div>

		<div class="res-banner" style='height:auto'>
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/yh/home/images/big.jpg" /></div>
				<div class="login-box" style='height:auto'>

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">修改密码</a></li>
							</ul>
								<a href="{{url('/login')}}" class="zcnext am-fr am-btn-default">登陆</a>
							
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">

									<form name='form1' method="post" action="{{url('/dofgedit')}}">
									{{ csrf_field() }}
									
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="password" name="user_password" id="user_password" placeholder="请输入密码" >
                 </div>				
                <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="password" name="repassword" id="repassword" placeholder="请输入确认密码" >
                 </div>						
                 		<input type="hidden" name='email' value="{{$email}}">				
                 
                 
                 </form>
                 
								<!--  <div class="login-links">
										<label for="reader-me">
											<input id="readme" type="checkbox" value='0'> 点击表示您同意商城《服务协议》
										</label>
							  	</div> -->
										<div class="am-cf">
											<input type="submit" id='submit'  value="确认修改" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>

								</div>

								

								<script>
									
									$(function() {
									    $('#doc-my-tabs').tabs();
									  });

									$('#submit').on('click',function(){
										$('form').submit();
									});

									
									
								</script>

							</div>
						</div>

				</div>
			</div>
					<div style='height:60px'></div>
					<div class="footer " >
						<div class="footer-hd ">
							@foreach($link as $v)
									<a href="{{ $v->link_url }}">{{ $v->link_text }}</a>
							@endforeach
						</div>
						<div class="footer-bd ">
							
							<p>
								@foreach($site as $v)
									{{ $v->site_copyright }}
								@endforeach
							</p>
						</div>
					</div>
	</body>
	

</html>