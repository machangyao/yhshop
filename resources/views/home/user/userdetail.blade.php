@extends('layouts.home.user_layout')
@section('content')
		<link href="/yh/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/yh/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/yh/home/js/brithday.js"></script>
		<link href="/yh/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/yh/home/css/infstyle.css" rel="stylesheet" type="text/css">
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<form class="am-form am-form-horizontal" action="{{url('/userdetail')}}/{{session('user_info')['id']}}" method='post' id="art_form">
						<div class="user-infoPic">
							<input type="hidden" size="50" id="avatar" name="avatar">

							<div class="filePic">
								<input id="file_upload" type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img id="art_thumb_img" style="width:120px;height:120px"  src="{{session('user_info')['avatar']}}" alt="" />
							</div>
							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{session('user_info')['user_name']}}</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>
						<p>{{session('tel')}}</p>
						<!--个人信息 -->
						<div class="info-main">
							
								{{csrf_field()}}
								{{method_field('put')}}
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="nickname" name='nickname' value="{{session('user_info')['nickname']}}">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="name" name='name' value="{{session('user_info')['name']}}">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" data-am-ucheck @if (session('user_info')['sex']=='2')checked @endif> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck @if (session('user_info')['sex']=='1')checked @endif> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" data-am-ucheck @if (session('user_info')['sex']=='0')checked @endif> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select  id="selYear" name='year'>
												<option value=""></option>
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select id="selMonth" name='month'>
													<option value=""></option>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select  id="selDay" name='day'>
													<option value=""></option>
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" placeholder="telephonenumber" type="tel" name='user_tel' value="{{session('user_info')['user_tel']}}">

									</div>
								</div>
								<!-- <div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" name='user_email'value="{{session('user')['user_email']}}">

									</div>
								</div> -->
							
								<div class="info-btn">
									<div class="am-btn am-btn-danger" id='update'>保存修改</div>
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
				<script type="text/javascript">
					var selYear = window.document.getElementById("selYear");
					var selMonth = window.document.getElementById("selMonth");
					var selDay = window.document.getElementById("selDay");
					// 新建一个DateSelector类的实例，将三个select对象传进去
					
					var year = '{{session('user_info')['birthday']}}'.slice(0,4);
					var month = '{{session('user_info')['birthday']}}'.slice(5,7);
					var day = '{{session('user_info')['birthday']}}'.slice(8,10);

					new DateSelector(selYear, selMonth, selDay, year, month, day);
					$('#update').on('click',function(){
						$('form').submit();
					});
					</script>
                    <script type="text/javascript">
					    $(function () {
					        $("#file_upload").change(function () {
					            uploadImage();
					        });
					    });
					    function uploadImage() {
					//                            判断是否有选择上传文件
					        var imgPath = $("#file_upload").val();
					        if (imgPath == "") {
					            alert("请选择上传图片！");
					            return;
					        }
					        //判断上传文件的后缀名
					        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
					        if (strExtension != 'jpg' && strExtension != 'gif'
					            && strExtension != 'png' && strExtension != 'bmp') {
					            alert("请选择图片文件");
					            return;
					        }
					//                            var myform = document.getElementById('art_from');


					        //将整个form打包进formData对象中传到服务器。
					//                                var formData = new FormData($('#art_form')[0]);




					        //只将文件上传表单项的内容放入formData对象
					        var formData = new FormData();
					        formData.append('file_upload', $('#file_upload')[0].files[0]);
					        formData.append('_token', '{{csrf_token()}}');
					        $.ajax({
					            type: "POST",
					            url: "/userdetail/upload",
					            data: formData,
					            async: true,
					            cache: false,
					            contentType: false,
					            processData: false,
					            success: function(data) {
					                $('#art_thumb_img').attr('src',data);
					                $('#avatar').val(data);
					            },
					            error: function(XMLHttpRequest, textStatus, errorThrown) {
					                alert("上传失败，请检查网络后重试");
					            }
					        });
					    }
					</script>
@stop			