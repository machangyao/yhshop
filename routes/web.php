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

////后台
//Route::get('/admin','Admin\IndexController@index');

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





//添加用户授权逻辑
    Route::post('user/doauth','UserController@doAuth');



    Route::post('role/doauth','RoleController@doAuth');
//权限相关路由
    Route::resource('permission','PermissionController');

// 分类路由
    Route::resource('category','CategoryController');

// 商品路由
    Route::resource('good','GoodController');

// 品牌路由route
    Route::resource('brand','BrandController');

//后台修改订单状态
    Route::get('order/status','OrderController@status');

//轮播图路由
    Route::resource('slide', 'SlideController');

//网站配置
    Route::get('site', 'SiteController@index');

//广告
    Route::resource('ads', 'AdsController');

//有请链接
    Route::resource('link', 'LinkController');

//文章
    Route::resource('article', 'ArticleController');
    // 分类路由
    Route::resource('/category','CategoryController');
    // 商品路由
    Route::resource('/good','GoodController');
    //商品上下架
    Route::get('/good/jia/{id}','GoodController@jia');
    // 品牌路由
    Route::resource('/brand','BrandController');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['islogin','hasRole']],function(){
// Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'islogin'],function(){

//后台首页
    Route::get('index','LoginController@index');

    //用户模块
    Route::resource('user','UserController');


//首页
//Route::get('/admin','Admin\IndexController@index');

//角色相关的路由
    Route::resource('role','RoleController');
});

//用户授权页面
Route::get('admin/user/auth/{id}','admin\UserController@auth');

//前台确认收货
Route::get('/order/status','Home\UserOrderController@status');
//订单管理
Route::resource('/admin/order','Admin\OrderController');




//编辑网站配置信息
Route::get('/admin/site/edit' , 'Admin\SiteController@edit');
Route::post('/admin/site', 'Admin\SiteController@syore');

Route::get('/admin/site/add','Admin\SiteController@add');
Route::post('/admin/site/doadd','Admin\SiteController@doadd');

//状态
Route::get('/admin/slide/state','Admin\SlideController@state');
//图片
Route::post('/admin/slide/upload','Admin\SlideController@upload');

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
Route::resource('/user','home\UserController');
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

//商品上下架
Route::get('/good/jia/{id}','Admin\GoodController@jia');



// 后台
 Route::group(['namespace'=>'Admin','middleware'=>'islogin'],function(){
     // 分类路由
     Route::resource('/category','CategoryController');
     // 商品路由
     Route::resource('/good','GoodController');
     //商品上下架
     Route::get('/good/jia/{id}','GoodController@jia');
     // 品牌路由
     Route::resource('/brand','BrandController');
 });

// 前台
// 首页路由
Route::get('/','Home\IndexController@index');
//商品搜索
Route::get('/search','Home\ListController@search');
// 商品列表页路由
Route::get('/list/{id}','Home\ListController@index');
// 商品详情页
Route::get('/show/{id}','Home\ShowController@show');
//加入购物车
Route::get('/addcart','Home\CartController@addcart');
//购物车页面
Route::get('/cart','Home\CartController@index');
//ajax购物车页面数量增加
Route::post('/addnum','Home\CartController@addnum');
//ajax购物车页面数量减少
Route::post('/minnum','Home\CartController@minnum');
//删除单个购物车商品
Route::post('/delcart','Home\CartController@delcart');
//删除购物车选中的商品
Route::post('/clearcart','Home\CartController@clearcart');
//订单页面
Route::get('/order','Home\OrderController@index');
//ajax订单页面数量增加
Route::post('/orderaddnum','Home\OrderController@orderaddnum');
//ajax订单页面数量减少
Route::post('/orderminnum','Home\OrderController@orderminnum');
//结算
Route::post('/pay','Home\PayController@index');
//下单成功
Route::get('/success/{id}','Home\SuccessController@index');
