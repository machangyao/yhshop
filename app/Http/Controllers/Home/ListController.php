<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Goods;

use App\Http\Models\Home\Brands;
use App\Http\Models\Home\Categorys;

class ListController extends Controller
{
    /*
	* 列表页
	* list
    */
    public function index(Request $request,$id)
    {
    	//获取搜索条件,只显示状态为1上架的商品
    	$keyword = $request->input('keyword','');

    	//获取所有品牌
    	$brands = Brands::all();
    	//获取所有分类
    	$cates = Categorys::where('pid',0)->get();




    	$data = Goods::where('name','like','%'. $keyword .'%')->where('cid',$id)->where('status',1)->where('number','>',0)->paginate(8);

    	// dd($data);
    	// return view('home.list',compact('data'));
    	return view('home.list',['data'=>$data,'where'=>['keyword'=>$keyword],'brands'=>$brands,'cates'=>$cates]);
    }


}
