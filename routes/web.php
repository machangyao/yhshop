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

// Route::get('/', function () {
//     return view('welcome');
// });

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

