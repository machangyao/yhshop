@extends('layouts.home.layout')
@section('title','确认订单页面')
@section('style')
<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/cartstyle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/jsstyle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<script type="text/javascript" src="{{ asset('/yh/home/js/address.js') }}"></script>
<script type="text/javascript" src="{{ asset('/yh/home/js/jquery-1.7.2.min.js') }}"></script>
@stop
@section('content')
			<form action="{{ url('/pay') }}" method="post">
			{{ csrf_field() }}
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>
							@foreach($addr as $v)
							<li class="user-addresslist @if($v->addr_status == 1) defaultAddr @endif ">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   <span class="buy-user">{{ $v->addr_name }} </span>
										<span class="buy-phone">{{ $v->addr_tel }}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   <span class="province">{{ $v->addr }}</span>
										<span class="street">{{ $v->addrdetail }}</span>
										</span>

										</span>
									</div>
									@if($v->addr_status == 1)
									<ins class="deftip">默认地址</ins>
									@endif
								</div>
								<div class="address-right">
									<a href="../person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									@if($v->addr_status == 0)
									<a href="#">设为默认</a>
									@endif
									<span class="new-addr-bar hidden">|</span>
									<a href="#">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick(this);">删除</a>
								</div>

							</li>
							@endforeach
							<div class="per-border"></div>
							

						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					<div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="/yh/home/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/yh/home/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="/yh/home/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->

					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

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
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>

							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										@if($newdata)
										<?php $total = 0; ?>
										@foreach($newdata as $v)
										<input type="hidden" name="ids[]" value="{{ $v['id'] }}">
										<input type="hidden" name="num[]" value="{{ $v['num'] }}">
										<input type="hidden" name="price[]" value="{{ $v['goodinfo']->price }}">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="{{ url('/show/'.$v['id']) }}" class="J_MakePoint">
															<img style="width:100%" src="/uploads/s_{{ $v['goodinfo']->pic }}" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="{{ url('/show/'.$v['id']) }}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v['goodinfo']->name }}</a>
														</div>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{ $v['goodinfo']->price }}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount" style="margin-top:20px;">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<!-- <input class="min am-btn" name="minnum" type="button" value="-" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']->price }}"/> -->
															<!-- <input class="text_box" id="num" name="" type="text" value="{{ $v['num'] }}" style="width:30px;" /> -->
															{{ $v['num'] }}
															<!-- <input class="add am-btn" name="addnum" type="button" value="+" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']->price }}"/> -->
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
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														快递<b class="sys_item_freprice">0</b>元
													</div>
												</div>
											</li>

										</ul>
										@endforeach

										<div class="clear"></div>

									</div>
							</tr>
							<div class="clear"></div>
							</div>

							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-coupon">

									<span class="coupon-title">优惠券</span>
									<select data-am-selected>
										<option value="a">
											<div class="c-price">
												<strong>￥8</strong>
											</div>
											<div class="c-limit">
												【消费满95元可用】
											</div>
										</option>
										<option value="b" selected>
											<div class="c-price">
												<strong>￥3</strong>
											</div>
											<div class="c-limit">
												【无使用门槛】
											</div>
										</option>
									</select>
								</li>

								<li class="td td-bonus">

									<span class="bonus-title">红包</span>
									<select data-am-selected>
										<option value="a">
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>10.40<span>元</span>
											</div>
										</option>
										<option value="b" selected>
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>50.00<span>元</span>
											</div>
										</option>
									</select>

								</li>

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum"><span id="total">{{ $total }}</span></em>
								</p>
							</div>
							
							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><span id="totalsfk">{{ $total }}</span></em>
											</span>
										</div>
										<input type="hidden" name="total" value="{{ $total }}">
										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   <span class="province">{{ session('defaultaddr')->addr }}</span>
												<span class="street">{{ session('defaultaddr')->addrdetail }}</span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">{{ session('defaultaddr')->addr_name }} </span>
												<span class="buy-phone">{{ session('defaultaddr')->addr_tel }}</span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<!-- <a id="J_Go" href="javascript:;" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a> -->
											<input type="submit" style="border:none; float:right;" class="btn-go" value="提交订单">
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						@endif
						<div class="clear"></div>
					</div>
				</div>
				</form>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<select data-am-selected>
									<option value="a">浙江省</option>
									<option value="b">湖北省</option>
								</select>
								<select data-am-selected>
									<option value="a">温州市</option>
									<option value="b">武汉市</option>
								</select>
								<select data-am-selected>
									<option value="a">瑞安区</option>
									<option value="b">洪山区</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
			<script>
			//增加数量
				$('input[name=addnum]').on('click',function(){
					// 获取id
					var id = $(this).attr('ids');

					obj = $(this);

					$.ajax({
						url:"{{ url('/orderaddnum') }}",
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

								//获取实付款
								var total = Number($("#totalsfk").html());
								total = total + price;
								$("#totalsfk").html(total);
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
						url:"{{ url('/orderminnum') }}",
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

								//获取实付款
								var total = Number($("#totalsfk").html());
								total = total - price;
								$("#totalsfk").html(total);
								
							}
						}
					});
				});

			</script>
@stop