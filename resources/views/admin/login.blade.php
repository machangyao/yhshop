<!DOCTYPE html>
<html>
<head>
	<title>Lambent Login Form a Flat Responsive Widget Template :: w3layouts</title>
	<link rel="stylesheet" href="/yh/admin/css/style.css">
	
<!--	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>-->
	
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Lambent Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
	<h1>轻轻摇曳的登录表单</h1>
	<div class="main-agileinfo">
		<h2>现在登录</h2>
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
		<form action="{{ url('admin/dologin') }}" method="post">
			{{ csrf_field() }}
			<input  type="text" name="name"  style='width:90%;'class="name" placeholder="用户名" required="" value="{{ old('name') }}">
			<input type="password" name="password" style='width:90%;'class="password" placeholder="密码" required="">
		
			
						<input style="width:60%;float:left;" type="text" class="code" placeholder="验证码" name="code" value="{{ old('code') }}"/>
						<span><i class="fa fa-check-square-o"></i></span>
{{--						<img style="float:left;"src="{{ url('admin/yzm') }}" alt="" onclick="this.src='{{ url('admin/yzm') }}?'+Math.random()">--}}

						<a onclick="javascript:re_captcha();">
							<img  src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">
						</a>
			
		
	
			<div class="clear"></div>
			<input type="submit" value="Login">
		</form>
	</div>
	<div class="footer-w3l">
		<p class="agile"> &copy; 2017 xxxxxxxxxxxxx</a></p>
	</div>
	<script type="text/javascript">
        		function re_captcha() {
            		$url = "{{ URL('/code/captcha') }}";
            		$url = $url + "/" + Math.random();
            		document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
        		}
	</script>

</body>
</html>