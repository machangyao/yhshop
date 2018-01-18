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



//前台
//
//个人安全信息
Route::resource('/user/safety','home\UserSafetyController')->middleware('homeIsLogin');
//修改密码路由
Route::resource('/user/password','home\UserPasswordController')->middleware('homeIsLogin');
//个人地址管理
Route::resource('/user/addr','home\UserAddrController');
//用户退出
Route::get('/user/lgout','home\UserDetailController@lgout');
//用户资源路由
Route::resource('/user','home\UserController');
//注册账号ajax路由
//
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
// 列表页路由
Route::get('/list','Home\ListController@list');
// 商品详情页
Route::get('/show','Home\ShowController@show');
// 后台
// 分类路由
Route::resource('/category','Admin\CategoryController');
// 商品路由
Route::resource('/good','Admin\GoodController');
//商品上下架
Route::get('/good/jia/{id}','Admin\GoodController@jia');
// 品牌路由oute
Route::resource('/brand','Admin\BrandController');


