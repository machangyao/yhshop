@extends('layouts.home.layout')
@section('title','购物车页面')
@section('style')
<link href="{{ asset('/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/cartstyle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/yh/home/css/optstyle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<script type="text/javascript" src="{{ asset('/yh/home/js/jquery-1.7.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/yh/layer/layer.js') }}"></script>
@stop
@section('content')
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
											<a href="{{ url('/show/'.$v['id']) }}" class="J_MakePoint" data-point="tbcart.8.12">
												<img style="width:100%" src="./uploads/s_{{ $v['goodinfo']['pic'] }}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a target="_bank" href="{{ url('/show/'.$v['id']) }}" title="{{ $v['goodinfo']['name'] }}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v['goodinfo']['name'] }}</a>
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
													<em class="J_Price price-now" tabindex="0">{{ $v['goodinfo']['price'] }}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="minnum" type="button" value="-" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']['price'] }}"/>
													<input class="text_box" id="num" name="" type="text" value="{{ $v['num'] }}" style="width:30px;text-align: center;"/>
													<input class="add am-btn" name="addnum" type="button" value="+" ids="{{ $v['id'] }}" price="{{ $v['goodinfo']['price'] }}"/>
												</div>
												@if($v['goodinfo']['number'] > 0)
													<div>有货</div>
												@else
													<div>无货</div>
												@endif
											</div>
										</div>
									</li>
									<?php
										//小计
										$sum = $v['goodinfo']['price'] * $v['num'];
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
							<a href="javascript:;" id="toorder" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span style="color:#fff">结&nbsp;算</span></a>
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
					//询问框
		            layer.confirm('您确定要删除吗？', {
		                btn: ['确定','取消'] //按钮
		            }, function(){

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

					if( id_array.length != 0)
					{
						//询问框
			            layer.confirm('您确定要删除吗？', {
			                btn: ['确定','取消'] //按钮
			            }, function(){

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
					}else{
						layer.msg('请至少选择一件商品删除', {icon: 5});
					}
					

				});


				//选中后的商品跳转到订单页面
				$("#toorder").on('click',function(){

					var id_array = [];

					//遍历复选框
					$('.check').each(function(){
						//判断哪个复选框被选中
						if($(this).is(":checked"))
						{
							//把获取到的ID变成数组
							id_array.push($(this).attr('idc'));
						}
					});

					//判断数组是否为空
					if( id_array.length == 0 )
					{
						layer.msg('请至少选择一件商品去结算', {icon: 5});
						return false;
					}

					//将数组转为字符串
					var idstr = id_array.join(',');
					window.location.href = "{{ url('/order?id=') }}"+ idstr;


				});
		</script>
@stop