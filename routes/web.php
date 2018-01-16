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

Route::get('/', function () {
    return view('welcome');
});

//登录页面路由
Route::get('admin/login','Admin\LoginController@login');

//登陆页面的验证码
Route::get('admin/yzm','Admin\LoginController@yzm');

Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');


//登陆页面的处理逻辑
Route::post('admin/dologin','Admin\LoginController@dologin');

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'islogin'],function(){
//后台首页
    Route::get('index','LoginController@index');

//退出登录
    Route::get('logout','LoginController@logout');


//用户模块
	Route::resource('user','UserController');
	
});
