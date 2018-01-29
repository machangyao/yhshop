@extends('layouts.home.layout')
@section('title','搜索页')
@section('style')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<script type="text/javascript" src="{{ asset('/yh/home/basic/js/jquery-1.7.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/yh/home/js/script.js') }}"></script>
@stop
@section('content')
<b class="line"></b>
<div class="search">
<div class="search-list">
<div class="nav-table">
		   <div class="long-title"><span class="all-goods">全部分类</span></div>
		   <div class="nav-cont">
				<ul>
					<li class="index"><a href="{{ url('/') }}">首页</a></li>
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

	
		<div class="am-g am-g-fixed">
			<div class="am-u-sm-12 am-u-md-12">
          	<div class="theme-popover">														
				<div class="searchAbout">
					

				</div>
				<ul class="select">
					<p class="title font-normal">
						<span class="fl">松子</span>
						<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
					</p>
					<div class="clear"></div>
					<li class="select-result">
						<dl>
							<dt>已选</dt>
							<dd class="select-no"></dd>
							<p class="eliminateCriteria">清除</p>
						</dl>
					</li>
					<div class="clear"></div>
					<li class="select-list">
						<dl id="select1">
							<dt class="am-badge am-round">品牌</dt>	
						
							 <div class="dd-conent">										
								<dd class="select-all selected"><a href="#">全部</a></dd>
								@foreach($brands as $v)
									<dd><a href="#">{{ $v->name }}</a></dd>
								@endforeach
							 </div>
			
						</dl>
					</li>
					<li class="select-list">
						<dl id="select2">
							<dt class="am-badge am-round">种类</dt>
							<div class="dd-conent">
								<dd class="select-all selected"><a href="#">全部</a></dd>
								@foreach($cates as $v)
								<dd><a href="#">{{ $v->name }}</a></dd>
								@endforeach
							</div>
						</dl>
					</li>
		        
				</ul>
				<div class="clear"></div>
            </div>
				<div class="search-content">
					<div class="sort">
						<li class="first"><a title="综合">综合排序</a></li>
						<li><a title="销量">销量排序</a></li>
						<li><a title="价格">价格优先</a></li>
						<li class="big"><a title="评价" href="#">评价为主</a></li>
					</div>
					<div class="clear"></div>

					<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
						@if(count($data))
							@foreach($data as $v)
							<li>
								<div class="i-pic limit">
									<a href="{{ url('/show/'.$v->id) }}"><img src="/uploads/s_{{ $v->pic }}" /></a>											
									<p class="title fl"><a href="{{ url('/show/'.$v->id) }}">{{ $v->name }}</a></p>
									<p class="price fl">
										<b>¥</b>
										<strong>{{ $v->price }}</strong>
									</p>
									<p class="number fl">
										销量 <span>{{ $v->salenum }}</span>
									</p>
								</div>
							</li>
							@endforeach
						@else
							<li style="width:100%; height: 100px; line-height: 100px;">
								<div style="text-align:center;">
									没有搜索到你想要的商品
								</div>
							</li>
						@endif
					</ul>
				</div>
				<div class="search-side">

					<div class="side-title">
						经典搭配
					</div>

					<li>
						<div class="i-pic check">
							<img src="/yh/home/images/cp.jpg" />
							<p class="check-title">萨拉米 1+1小鸡腿</p>
							<p class="price fl">
								<b>¥</b>
								<strong>29.90</strong>
							</p>
							<p class="number fl">
								销量<span>0</span>
							</p>
						</div>
					</li>

				</div>
				<div class="clear"></div>
				<!--分页 -->
				<div class="pagination">{!! $data->appends($where)->render() !!}</div>
			</div>
		</div>
@stop