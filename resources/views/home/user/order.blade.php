@extends('layouts.home.user_layout')
@section('content')
<link href="/yh/home/css/orstyle.css" rel="stylesheet" type="text/css">
<div class="center">
<div class="col-main">
<div class="main-wrap">

	<div class="user-order">

		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
		</div>
		<hr/>

		<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

			<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
				<li class="am-active"><a href="#tab1">所有订单</a></li>

			</ul>

			<div class="am-tabs-bd">
				<div class="am-tab-panel am-fade am-in am-active" id="tab1">
					<div class="order-top">
						<div class="th th-item">
							<td class="td-inner">商品</td>
						</div>
						<div class="th th-price">
							<td class="td-inner">单价</td>
						</div>
						<div class="th th-number">
							<td class="td-inner">数量</td>
						</div>
						<div class="th th-operation">
							<td class="td-inner">商品操作</td>
						</div>
						<div class="th th-amount">
							<td class="td-inner">合计</td>
						</div>
						<div class="th th-status">
							<td class="td-inner">交易状态</td>
						</div>
						<div class="th th-change">
							<td class="td-inner">交易操作</td>
						</div>
					</div>

					<div class="order-main">
						<div class="order-list">

							<!--不同状态订单-->
							
							<div class="order-status3">
							@foreach ($orders as $v)
								@if (empty($v))
									break
								@endif
							
								<div class="order-content">

									<div class="order-left">
										@foreach ($v->Goods as $n)
										<ul class="item-list">
											<li class="td td-item">
												<div class="item-pic">
													<a href="#" class="J_MakePoint">
														<img src="{{$n->pic}}" class="itempic J_ItemImg">
													</a>
												</div>
												<div class="item-info" style='float:none;'>
													<div class="item-basic-info">
														<a href="#">
															<p>{{$n->name}}</p>
															<p class="info-little">颜色：12#川南玛瑙
																<br/>包装：裸装 </p>
														</a>
													</div>
												</div>
											</li>
											<li class="td td-price">
												<div class="item-price">
													{{$n->market_price}}
												</div>
											</li>
											<li class="td td-number">
												<div class="item-number">
													<span>×</span>{{$n->count}}
												</div>
											</li>
											<li class="td td-operation">
												<div class="item-operation">
													<a href="refund.html">退款/退货</a>
												</div>
											</li>
										</ul>
										@endforeach
									</div>
									<div class="order-right">
										<li class="td td-amount">
											<div class="item-amount">
												合计：{{$v->order_price}}
												<p>含运费：<span>10.00</span></p>
											</div>
										</li>
										<div class="move-right">
											<li class="td td-status">
												<div class="item-status">
													<p class="Mystatus">卖家已发货</p>
													<p class="ordeFr-info"><a href="{{url('/user/order')}}/{{$v->id}}">订单详情</a></p>
													<p class="order-info"><a href="logistics.html">查看物流</a></p>
													<p class="order-info"><a href="#">延长收货</a></p>
												</div>
											</li>
											<li class="td td-change">
												<div class="am-btn am-btn-danger anniu">
													确认收货</div>
											</li>
										</div>
									</div>

								</div>
							@endforeach

								</div>
							
							

						</div>

					</div>

				</div>
				<div class="am-tab-panel am-fade" id="tab2">

					<div class="order-top">
						<div class="th th-item">
							<td class="td-inner">商品</td>
						</div>
						<div class="th th-price">
							<td class="td-inner">单价</td>
						</div>
						<div class="th th-number">
							<td class="td-inner">数量</td>
						</div>
						<div class="th th-operation">
							<td class="td-inner">商品操作</td>
						</div>
						<div class="th th-amount">
							<td class="td-inner">合计</td>
						</div>
						<div class="th th-status">
							<td class="td-inner">交易状态</td>
						</div>
						<div class="th th-change">
							<td class="td-inner">交易操作</td>
						</div>
					</div>

					<div class="order-main">
						<div class="order-list">
							<div class="order-status1">
								<div class="order-title">
									<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
									<span>成交时间：2015-12-20</span>
									<!--    <em>店铺：小桔灯</em>-->
								</div>
								<div class="order-content">
								
									<div class="order-right">
								
										<div class="move-right">
											<li class="td td-status">
												<div class="item-status">
													<p class="Mystatus">等待买家付款</p>
													<p class="order-info"><a href="#">取消订单</a></p>

												</div>
											</li>
											<li class="td td-change">
												<a href="pay.html">
												<div class="am-btn am-btn-danger anniu">
													一键支付</div></a>
											</li>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
				</div>
					</div>
					<div class="order-main">
						<div class="order-list">
							<!--不同状态的订单	-->
						<div class="order-status4">

								<div class="order-content">

									<div class="order-right">

										<div class="move-right">

										</div>
									</div>
								</div>
							</div>
							
							
							<div class="order-status4">

								<div class="order-content">
									
									<div class="order-right">
										
				<div class="am-tab-panel am-fade" id="tab5">
					<div class="order-top">
						<div class="th th-item">

										<div class="move-right">
											<li class="td td-status">
												<div class="item-status">
													<p class="Mystatus">交易成功</p>
													<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
													<p class="order-info"><a href="logistics.html">查看物流</a></p>
												</div>
											</li>
											<li class="td td-change">
												<a href="commentlist.html">
													<div class="am-btn am-btn-danger anniu">
														评价商品</div>
												</a>
											</li>
										</div>
									</div>
								</div>
							</div>


						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@stop