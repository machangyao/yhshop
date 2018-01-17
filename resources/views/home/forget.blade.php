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
			<a href="home/demo.html"><img alt="" src="/yh/home/images/logobig.png" /></a>
		</div>

		<div class="res-banner" style='height:auto'>
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/yh/home/images/big.jpg" /></div>
				<div class="login-box" style='height:auto'>

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">忘记密码</a></li>
							</ul>
								<a href="{{url('/login')}}" class="zcnext am-fr am-btn-default">登陆</a>
							
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">

									<form name='form1' method="post" action="{{url('/forget')}}">
									{{ csrf_field() }}
									
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="user_email" id="email" placeholder="请输入邮箱" value="{{ old('user_email') }}">
                 </div>				
                					
                 									
                 
                 
                 </form>
                 
								<!--  <div class="login-links">
										<label for="reader-me">
											<input id="readme" type="checkbox" value='0'> 点击表示您同意商城《服务协议》
										</label>
							  	</div> -->
										<div class="am-cf">
											<input type="submit" id='submit' disabled='false' value="发送邮件" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>

								</div>

								

								<script>
									var a = null;
									$.ajaxSetup({
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                }
			            });
									$(function() {
									    $('#doc-my-tabs').tabs();
									  });

									$('#submit').on('click',function(){
										$('form').submit();
									});

									function isEmail(str){ 
										var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
										return reg.test(str); 
									} 
									$('#email').on('blur',function(){
										var emailVal = $('#email').val();
										if(isEmail(emailVal)){
											$('#submit').attr('disabled',false);
										}else{
											$('#submit').attr('disabled',true);

										}
									})

									
								</script>

							</div>
						</div>

				</div>
			</div>
					<div style='height:60px'></div>
					<div class="footer " >
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>
	

</html>