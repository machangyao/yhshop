<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//授权页面
Route::get('admin/auth','Admin\LoginController@auth');

//登录页面路由
Route::get('admin/login','Admin\LoginController@login');

//登陆页面的验证码
Route::get('admin/yzm','Admin\LoginController@yzm');

Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');


//登陆页面的处理逻辑
Route::post('admin/dologin','Admin\LoginController@dologin');

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'islogin'],function(){
//退出登录
    Route::get('logout','LoginController@logout');

//修改密码
    Route::get('/user/pass','UserController@pass');

    Route::post('/user/dopass','UserController@dopass');

//用户模块
     Route::resource('user','UserController');

//用户授权页面
    Route::get('user/auth/{id}','UserController@auth');

//添加用户授权逻辑
    Route::post('user/doauth','UserController@doAuth');

    Route::get('role/auth/{id}','RoleController@auth');

    Route::post('role/doauth','RoleController@doAuth');
//权限相关路由
    Route::resource('permission','PermissionController');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['islogin','hasRole']],function(){
// Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'islogin'],function(){

//后台首页
    Route::get('index','LoginController@index');

//角色相关的路由
	Route::resource('role','RoleController');
	
});



//后台

Route::get('/admin','Admin\IndexController@index');

//后台修改订单状态
Route::get('/admin/order/status','Admin\OrderController@status');
//前台确认收货
Route::get('/order/status','Home\UserOrderController@status');
//订单管理
Route::resource('/admin/order','Admin\OrderController');


//首页
Route::get('/admin','Admin\IndexController@index');


//轮播图路由
Route::resource('/admin/slide', 'Admin\SlideController');

//网站配置
Route::get('/admin/site', 'Admin\SiteController@index');
//编辑网站配置信息
Route::get('/admin/site/edit' , 'Admin\SiteController@edit');
Route::post('/admin/site', 'Admin\SiteController@syore');

//有请链接
Route::resource('/admin/link', 'Admin\LinkController');

//广告
Route::resource('admin/ads', 'Admin\AdsController');

//文章
Route::resource('admin/article', 'Admin\ArticleController');




//前台

//个人订单

Route::resource('/user/order','home\UserOrderController')->middleware('homeIsLogin');

//个人收藏
Route::get('/user/collect/create','home\CollectController@create');
Route::get('/user/collect/del','home\CollectController@del')->middleware('homeIsLogin');
Route::get('/user/collect','home\CollectController@index')->middleware('homeIsLogin');
//个人安全信息

Route::resource('/user/safety','home\UserSafetyController')->middleware('homeIsLogin');
//修改密码路由
Route::resource('/user/password','home\UserPasswordController')->middleware('homeIsLogin');
//个人地址管理
Route::post('/user/daddr','home\UserAddrController@daddr')->middleware('homeIsLogin');
Route::resource('/user/addr','home\UserAddrController')->middleware('homeIsLogin');
//城市联动ajax
Route::post('/city/ajax','home\UserAddrController@ajax');
//用户退出
Route::get('/user/lgout','home\UserDetailController@lgout');
//用户资源路由
Route::resource('/user','home\UserController')->middleware('homeIsLogin');
//注册账号ajax路由
Route::post('/user/ajax','home\UserController@ajax');
//修改手机号ajax路由
//登陆路由
Route::get('/login','home\UserController@login');
//执行登陆路由
Route::post('/login','home\UserController@dologin');
//忘记密码
Route::get('/forget','home\ForgetController@forget');
//执行忘记密码
Route::post('/forget','home\ForgetController@doforget');
Route::get('/fgedit/{email}','home\ForgetController@fgedit');
Route::post('/dofgedit','home\ForgetController@dofgedit');
//登陆验证码路由
Route::get('/code/captcha/{tmp}', 'home\UserController@captcha');
//用户个人资料路由
Route::get('/mycenter','home\UserDetailController@mycenter')->middleware('homeIsLogin');
//个人信息
Route::resource('/userdetail','home\UserDetailController')->middleware('homeIsLogin');
//个人头像上传ajax
Route::post('/userdetail/upload','home\UserDetailController@upload');

// 前台
// 首页路由
Route::get('/','Home\IndexController@index');
// 商品列表页路由
Route::get('/list/{id}','Home\ListController@index');
// 商品详情页
Route::get('/show/{id}','Home\ShowController@show');
//购物车页面
Route::get('/cart','Home\CartController@index');
// 后台
// 分类路由
Route::resource('/category','Admin\CategoryController');
// 商品路由
Route::resource('/good','Admin\GoodController');
//商品上下架
Route::get('/good/jia/{id}','Admin\GoodController@jia');

// 品牌路由route
Route::resource('/brand','Admin\BrandController');
