<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>个人资料</title>


	<script src="/yh/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="/yh/home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
	<link href="/yh/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
	<link href="/yh/home/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/yh/home/css/systyle.css" rel="stylesheet" type="text/css">

</head>

<body>
<!--头 -->
<header>
	<article>
		<div class="mt-logo">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="{{url('/login')}}" target="_top" class="h">	亲，{{session('user_info')['user_name']}}</a>
							<a href="{{url('/user/lgout')}}" target="_top">退出</a>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="{{url('/')}}" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="{{url('/mycenter')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
			<!-- 轮播图 -->
				@foreach($site as $v)
				
				<div class="logoBig">
					<li><a href="{{url('/')}}"><img src="/uploads/{{ $v->site_logo }}" /></a></li>
				</div>
				@endforeach

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form action="{{ url('/search') }}" method="get">
					<input id="searchInput" name="keyword" type="text" placeholder="搜索" autocomplete="off" @if(!empty($where['keyword'])) value="{{ $where['keyword'] }}" @else value="" @endif>
					<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
				</form>
				</div>
			</div>


			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="{{url('/mycenter')}}">个人中心</a>
					</li>
					<li class="person">

						<a href="javascript:;">个人资料</a>
						<ul>
							<li> <a href="{{url('/userdetail')}}">个人信息</a></li>
							<li> <a href="{{url('/user/safety')}}">安全设置</a></li>
							<li> <a href="{{url('/user/addr')}}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">

						<a href="javascript:;">我的交易</a>
						<ul>
							<li><a href="{{url('/user/order')}}">订单管理</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="javascript:;">我的小窝</a>
						<ul>
							<li> <a href="{{url('/user/collect')}}">收藏</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
		</div>
	</article>
</header>
<div class="nav-table">
	<div class="long-title"><span class="all-goods">全部分类</span></div>
	<div class="nav-cont">
		<ul>
			<li class="index"><a href="#">首页</a></li>
			<li class="qc"><a href="#">闪购</a></li>
			<li class="qc"><a href="#">限时抢</a></li>
			<li class="qc"><a href="#">团购</a></li>
			<li class="qc last"><a href="#">大包装</a></li>
		</ul>
		<div class="nav-extra">
			<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
			<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
		</div>
	</div>
</div>
<b class="line"></b>


@section('content')
@show
<div class="footer">
	<div class="footer-hd">

	@foreach($link as $v)
			<a href="{{ $v->link_url }}">{{ $v->link_text }}</a>
	@endforeach
	</div>
	<div class="footer-bd">
		<p>
			@foreach($site as $v)
				{{ $v->site_copyright }}
			@endforeach
		</p>
	</div>
</div>

</div>

<aside class="menu">
	<ul>
		<li class="person active">
			<a href="{{url('/mycenter')}}">个人中心</a>
		</li>
		<li class="person">
			<a href="javascript:;">个人资料</a>
			<ul>
				<li> <a href="{{url('/userdetail')}}">个人信息</a></li>
				<li> <a href="{{url('/user/safety')}}">安全设置</a></li>
				<li> <a href="{{url('/user/addr')}}">收货地址</a></li>
			</ul>
		</li>
		<li class="person">
			<a href="javascript:;">我的交易</a>
			<ul>
				<li><a href="{{url('/user/order')}}">订单管理</a></li>
			</ul>
		</li>
		<li class="person">
			<a href="javascript:;">我的小窝</a>
			<ul>
				<li> <a href="{{url('/user/collect')}}">收藏</a></li>
			</ul>
		</li>

	</ul>

</aside>
</div>
<!--引导 -->
<div class="navCir">
	<li><a href="/yh/home/home/home.html"><i class="am-icon-home "></i>首页</a></li>
	<li><a href="/yh/home/home/sort.html"><i class="am-icon-list"></i>分类</a></li>
	<li><a href="/yh/home/home/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
	<li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
</body>

</html>