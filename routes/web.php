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



//后台
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



//用户资源路由
Route::resource('/user','home\UserController');
//注册账号ajax路由
Route::post('/user/ajax','home\UserController@ajax');
//登陆路由
Route::get('/login','home\UserController@login');
//执行登陆路由
Route::post('/login','home\UserController@dologin');
//忘记密码
Route::get('/forget','home\ForgetController@forget');
//执行忘记密码
Route::post('/forget','home\ForgetController@doforget');
Route::get('/fgedit','home\ForgetController@fgedit');
//登陆验证码路由
Route::get('/code/captcha/{tmp}', 'home\UserController@captcha');


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

// 品牌路由oute
Route::resource('/brand','Admin\BrandController');



