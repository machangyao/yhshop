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

