@extends('layouts.home.layout')

@section('content')
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								<li class="banner1"><a href="introduction.html"><img src="/yh/home/images/ad1.jpg" /></a></li>
								<li class="banner2"><a><img src="/yh/home/images/ad2.jpg" /></a></li>
								<li class="banner3"><a><img src="/yh/home/images/ad3.jpg" /></a></li>
								<li class="banner4"><a><img src="/yh/home/images/ad4.jpg" /></a></li>

							</ul>
						</div>
						<div class="clear"></div>	
			</div>						
			
			<div class="shopNav">
				<div class="slideall">
			        
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
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											@foreach($cates as $v)
											@if($v->pid == 0)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/yh/home/images/cake.png"></i><a class="ml-22" title="点心">{{ $v->name }}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	@foreach($cates as $vv)
																	@if($v->id == $vv->pid)
																	<dl class="dl-sort">
																		<dt><span title="{{ $vv->name }}">{{ $vv->name }}</span></dt>
																		@foreach($cates as $vvv)
																		@if($vv->id == $vvv->pid)
																		<dd><a title="{{ $vvv->name }}" href="{{ url('/list/'.$vvv->id) }}"><span>{{ $vvv->name }}</span></a></dd>
																		@endif
																		@endforeach
																	</dl>
																	@endif
																	@endforeach
																</div>
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endif
											@endforeach
										</ul>
									</div>
								</div>

							</div>
						</div>
						<!--轮播 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/yh/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/yh/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/yh/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/yh/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/yh/home/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/yh/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								@if (session('user_info'))
								<a href="{{url('/mycenter')}}">
									<img src="{{session('user_info')['avatar']}}">
								</a>
								<em>
									Hi,<span class="s-name">{{session('user_info')['user_name']}}</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">

								@elseif (!session('user_info'))
									<a href="{{url('/login')}}">
										<img src="/yh/home/images/getAvatar.do.jpg">
									</a>
									<em>
										Hi,<span class="s-name">游客</span>
										<a href="#"><p>点击更多优惠活动</p></a>
									</em>
							</div>
							<div class="member-logout">

								<a class="am-btn-warning btn" href="{{url('/login')}}?url={{\Illuminate\Support\Facades\Input::url()}}">登录</a>
								<a class="am-btn-warning btn" href="{{url('/user/create')}}">注册</a>
									@endif
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/yh/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3">
							<img src="/yh/home/images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain ">
								<img src="/yh/home/images/tj.png "></img>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain ">
								<img src="/yh/home/images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain ">
								<img src="/yh/home/images/tj2.png "></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a class="more-link " href="# ">全部活动</a>
                            </span>
						</div>
					
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src="/yh/home/images/activity1.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="/yh/home/images/activity2.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="/yh/home/images/activity3.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="/yh/home/images/activity.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div>

					  </div>
                   </div>
					<div class="clear "></div>

					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                    <a class="more-link " href="# ">更多美味</a>
                        </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodOne ">
						<div class="am-u-sm-5 am-u-md-3 am-u-lg-4 text-one ">
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>					
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
                                  <img src="/yh/home/images/act1.png " />								
							</a>
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-4">
							<div class="text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										仅售：¥13.8
									</div>
									
								</div>
								<a href="# "><img src="/yh/home/images/act2.png " /></a>
							</div>
							<div class="text-two last">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										仅售：¥13.8
									</div>
									
								</div>
								<a href="# "><img src="/yh/home/images/act2.png " /></a>
						    </div>
						</div>
		             <div class="am-u-sm-12 am-u-md-4 ">
						<div class="am-u-sm-3 am-u-md-6 text-three">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>

						<div class="am-u-sm-3 am-u-md-6 text-three">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>

						<div class="am-u-sm-3 am-u-md-6 text-three">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>

						<div class="am-u-sm-3 am-u-md-6 text-three last ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>
					</div>

					</div>
                 <div class="clear "></div>
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                    <a class="more-link " href="# ">更多美味</a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodTwo ">
						
						
						<div class="am-u-sm-5 am-u-md-4 text-one ">
							<a href="# ">
								<img src="/yh/home/images/act1.png " />
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
									
								</div>
							</a>
						</div>
						<div class="am-u-sm-7 am-u-md-4 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									
									<div class="sub-title ">
										仅售：¥13.8
									</div>
								</div>
								<a href="# "><img src="/yh/home/images/5.jpg " /></a>						
						</div>
						
						<div class="am-u-md-4 am-u-lg-2 text-three">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>
						<div class="am-u-md-4 am-u-lg-2 text-three">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>
						<div class="am-u-sm-6 am-u-md-4 am-u-lg-2 text-two ">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									
									<div class="sub-title ">
										仅售：¥13.8
									</div>
								</div>
								<a href="# "><img src="/yh/home/images/5.jpg " /></a>						
						</div>						
						<div class="am-u-sm-6 am-u-md-3 am-u-lg-2 text-four ">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									
									<div class="sub-title ">
										仅售：¥13.8
									</div>
								</div>
								<a href="# "><img src="/yh/home/images/5.jpg " /></a>						
						</div>				
						<div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
								
							</div>
							<a href="# "><img src="/yh/home/images/act2.png " /></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-3 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
							</div>
							<a href="# "><img src="/yh/home/images/act3.png " /></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									尝鲜价：¥4.8
								</div>
								
							</div>
							<a href="# "><img src="/yh/home/images/act2.png " /></a>
						</div>							
					</div>

					<div class="clear "></div>


                 
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>海味</h4>
							<h3>你是我的优乐美么？不，我是你小鱼干</h3>
							<div class="today-brands ">
								<a href="# ">小鱼干</a>
								<a href="# ">海苔</a>
								<a href="# ">鱿鱼丝</a>
								<a href="# ">海带丝</a>
							</div>
							<span class="more ">
                    <a class="more-link " href="# ">更多美味</a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed flood method3 ">
						<ul class="am-thumbnails ">
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp.jpg " />
										<div class="pro-title ">萨拉米 1+1小鸡腿</div>
										<span class="e-price ">￥29.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp2.jpg " />
										<div class="pro-title ">ZEK 原味海苔</div>
										<span class="e-price ">￥8.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp.jpg " />
										<div class="pro-title ">萨拉米 1+1小鸡腿</div>
										<span class="e-price ">￥29.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp2.jpg " />
										<div class="pro-title ">ZEK 原味海苔</div>
										<span class="e-price ">￥8.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp.jpg " />
										<div class="pro-title ">萨拉米 1+1小鸡腿</div>
										<span class="e-price ">￥29.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp2.jpg " />
										<div class="pro-title ">ZEK 原味海苔</div>
										<span class="e-price ">￥8.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp.jpg " />
										<div class="pro-title ">萨拉米 1+1小鸡腿</div>
										<span class="e-price ">￥29.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp2.jpg " />
										<div class="pro-title ">ZEK 原味海苔</div>
										<span class="e-price ">￥8.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp.jpg " />
										<div class="pro-title ">萨拉米 1+1小鸡腿</div>
										<span class="e-price ">￥29.90</span>
									</a>
								</div>
							</li>
							<li>
								<div class="list ">
									<a href="# ">
										<img src="/yh/home/images/cp2.jpg " />
										<div class="pro-title ">ZEK 原味海苔</div>
										<span class="e-price ">￥8.90</span>
									</a>
								</div>
							</li>

						</ul>

					</div>
@stop