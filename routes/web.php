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

//首页路由
Route::get('/','Home\IndexController@index');

//后台
Route::get('/admin','admin\IndexController@index');

//轮播图路由
Route::resource('/admin/slide', 'admin\SlideController');



