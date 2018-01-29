<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<script src="/yh/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<link rel="stylesheet" href="/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/yh/home/css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			
			@foreach($site as $v)
				
				<div class="logoBig">
					<li><img src="{{ $v->site_logo }}" /></li>
				</div>
				@endforeach

		</div>

		<div class="login-banner" style='height:550px'>
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/yh/home/images/big.jpg" /></div>
				<div class="login-box" style='height:auto'>

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
							@if (count($errors) > 0)
								    <div class="alert alert-danger" >
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
								<p>{{session('yzm')}}{{session('yz')}}{{session('msg')}}</p>
						<div class="login-form">
								<form name='form1' method="post" action="{{url('/login')}}">
									{{ csrf_field() }}
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="user_name" id="user" placeholder="邮箱/手机/用户名" value="{{session('user_name')}}">

                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="user_password" id="password" placeholder="请输入密码" value="{{old('user_password')}}">
                 </div>
                 <div class="user-pass" style='height:auto'>
                  	<label for="password"><i class="am-icon-lock"></i></label>
								    <input name="captcha" type="text" placeholder="验证码">  
										<a onclick="javascript:re_captcha();">  
										<img src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">  
										</a>  
                 </div>	
                 <input type="hidden" name='remember' id='checked'>
              </form>
           </div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="{{url('/forget')}}" class="am-fr">忘记密码</a>
								<a href="{{url('/user/create')}}" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">
									<input id='submit' type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>


					<div class="footer ">
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
	<script type="text/javascript">  
		function re_captcha() {  
		    $url = "{{ URL('/code/captcha') }}";
		    $url = $url + "/" + Math.random();
		        document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
		    };
		$('#submit').on('click',function(){
			if($('#remember-me').is(':checked')) {
				$('#checked').val('yes');
			}
			$('form').submit();
		});
</script> 
</html>