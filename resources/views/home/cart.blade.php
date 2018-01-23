<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/yh/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/yh/home/css/cartstyle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/yh/home/css/optstyle.css') }}" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="{{ asset('/yh/home/js/jquery-1.7.2.min.js') }}"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							@if (session('user_info')) 
							<a href="#" target="_top" class="h">亲，{{session('user_info')['user_name']}} </a>
							<a href="{{url('/user/lgout')}}" target="_top">退出</a>
							@else
							<a href="{{url('/login')}}" target="_top" class="h">亲，请登录 </a>
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
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/yh/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/yh/home/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					@if(session('cart'))
					<?php $total = 0; ?>
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="clear"></div>
							<div class="bundle-main">
								
								@foreach(session('cart') as $v)
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" idc="{{ $v['id'] }}" name="items[]" value="" type="checkbox">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="javascript:;" class="J_MakePoint" data-point="tbcart.8.12">
												<img style="width:100%" src="./uploads/s_{{ $v['goodinfo']->pic }}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a target="_bank" href="{{ url('/show/'.$v['id']) }}" title="{{ $v['goodinfo']->name }}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v['goodinfo']->name }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props ">
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">{{ $v['goodinfo']->price }}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="minnum" type="button" value="-" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']->price }}"/>
													<input class="text_box" id="num" name="" type="text" value="{{ $v['num'] }}" style="width:30px;"/>
													<input class="add am-btn" name="addnum" type="button" value="+" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']->price }}"/>
												</div>
											</div>
										</div>
									</li>
									<?php
										//小计
										$sum = $v['goodinfo']->price * $v['num'];
										//合计

										$total = $total + $sum;
									?>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" id="money{{ $v['id'] }}" class="J_ItemSum number">{{ $sum }}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a>
											<a href="javascript:;" onclick="delcart(this,{{ $v['id'] }})" data-point-url="#" class="delete">
                  删除</a>
										</div>
									</li>
								</ul>
								@endforeach
							</div>
						</div>
					</tr>
					
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input style="margin-top:20px;" id="checkall" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="javascript:;" class="clearcart">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount"><span id="count">{{ count(session('cart')) }}</span></em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total"><span id="total">{{ $total }}</span></em></strong>
						</div>
						<div class="btn-area">
							<a href="{{ url('') }}" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

					@else
					<tr>
						<td>
							<div style=" border:#F5F5F5 1px solid; text-align: center; height: 200px; line-height: 200px;">购物车暂无商品,请<a href="{{ url('/') }}" style="color:#f40">先去购物。</a></div>
						</td>
					</tr>
					@endif

				</div>

				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<form class="theme-signin" name="loginform" action="" method="post">

						<div class="theme-signin-left">

							<li class="theme-options">
								<div class="cart-title">颜色：</div>
								<ul>
									<li class="sku-line selected">12#川南玛瑙<i></i></li>
									<li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>
								</ul>
							</li>
							<li class="theme-options">
								<div class="cart-title">包装：</div>
								<ul>
									<li class="sku-line selected">包装：裸装<i></i></li>
									<li class="sku-line">两支手袋装（送彩带）<i></i></li>
								</ul>
							</li>
							<div class="theme-options">
								<div class="cart-title number">数量</div>
								<dd>
									<input class="min am-btn am-btn-default" name="" type="button" value="-"/>
									<input class="text_box" name="" type="text" value="1" style="width:30px;" />
									<input class="add am-btn am-btn-default" name="" type="button" value="+"/>
									<span  class="tb-hidden">库存<span class="stock">1000</span>件</span>
								</dd>

							</div>
							<div class="clear"></div>
							<div class="btn-op">
								<div class="btn am-btn am-btn-warning">确认</div>
								<div class="btn close am-btn am-btn-warning">取消</div>
							</div>

						</div>
						<div class="theme-signin-right">
							<div class="img-info">
								<img src="/yh/home/images/kouhong.jpg_80x80.jpg" />
							</div>
							<div class="text-info">
								<span class="J_Price price-now">¥39.00</span>
								<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
							</div>
						</div>

					</form>
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	
		<script>
			//增加数量
			$('input[name=addnum]').on('click',function(){
					// 获取id
					var id = $(this).attr('ids');

					obj = $(this);

					$.ajax({
						url:"{{ url('/addnum') }}",
						type:'post',
						data:{'id':id,'_token':'{{ csrf_token() }}'},
						success:function(data){
							if(data)
							{
								// 获取商品数量
								var num = obj.prev().val();
								num = Number(num);
								obj.prev().val(++num);

								//获取单价
								var price = Number(obj.attr('price'));
								// 获取小计
								var money = Number( $("#money"+id).html() );
								money = money + price;
								$("#money"+id).html(money);

								//获取总计
								var total = Number($("#total").html());
								total = total + price;
								$("#total").html(total);
							}
						}
					});
				});

				//减少数量
				$('input[name=minnum]').on('click',function(){
					// 获取id
					var id = $(this).attr('ids');

					obj = $(this);

					$.ajax({
						url:"{{ url('/minnum') }}",
						type:'post',
						data:{'id':id,'_token':'{{ csrf_token() }}'},
						success:function(data){
							if(data)
							{
								// 获取商品数量
								var num = obj.next().val();
								num = Number(num);
								if(num<=1)
								{
									return "";
								}
								obj.next().val(--num);

								//获取单价
								var price = Number(obj.attr('price'));
								// 获取小计
								var money = Number( $("#money"+id).html() );
								money = money - price;
								$("#money"+id).html(money);

								//获取总计
								var total = Number($("#total").html());
								total = total - price;
								$("#total").html(total);
								
							}
						}
					});
				});

				//删除单个购物车商品
				function delcart(obj,id)
				{
					$.ajax({
						url:"{{ url('/delcart') }}",
						type:'POST',
						data:{'id':id,'_token':'{{ csrf_token() }}'},
						success:function(data){
							if(data)
							{
								$(obj).parent().parent().parent().remove();
								window.location.href = location.href;
							}
						}
					});
				}


				//全选全不选
				$("#checkall").on('click',function(){
					if($(this).is(":checked"))
					{
						$('.check').prop('checked',true);
					}else{
						$('.check').prop('checked',false);
					}
				});

				//删除购物车选中的商品
				$(".clearcart").on('click',function(){
					var id_array = [];
					//如果那个复选框被选中，获取id
					$('.check').each(function(){
						if( $(this).is(":checked") )
						{
							//alert($(this).attr('idc'));
							// 把ID转成数组
							id_array.push($(this).attr('idc'));
						}
					});
					// 将数组转为字符串
					var idstr = id_array.join(',');

					
					$.ajax({
						url:"{{ url('/clearcart') }}",
						type:'post',
						data:{'id':idstr,'_token':'{{ csrf_token() }}'},
						success:function(data){
							if(data)
							{
								window.location.href = location.href;
							}
						}
					});


				});
		</script>

	</body>

</html>