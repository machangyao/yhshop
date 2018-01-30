<div class="hmtop">
	<!--顶部导航条 -->
	<div class="am-container header">
		<ul class="message-l">
			<div class="topMessage">
				<div class="menu-hd">
					@if (session('user_info'))
						亲，<a href="{{url('/mycenter')}}" target="_top" class="h">{{session('user_info')['user_name']}} </a>
					<a href="{{url('/user/lgout')}}" target="_top">退出</a>
					@else
					<a href="{{url('/login')}}?url={{\Illuminate\Support\Facades\Input::url()}}" target="_top" class="h">亲，请登录 </a>
					<a href="{{url('/user/create')}}" target="_top">注册</a>
					@endif
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
				<div class="menu-hd">
				@if(session('user_info'))
				<a id="mc-menu-hd" href="{{ url('/cart') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"> {{ count(session('cart')) }}</strong></a>
				@else
				<a id="mc-menu-hd" href="javascript:;" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"> 0</strong></a>
				@endif
			</div>
			</div>
			<div class="topMessage favorite">
		</ul>
		</div>

		<!--悬浮搜索框-->

		<div class="nav white">
			@foreach($site as $v)
			<div class="logo"><img src="{{ $v->site_logo }}" /></div>
			
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

		<div class="clear"></div>
	</div>