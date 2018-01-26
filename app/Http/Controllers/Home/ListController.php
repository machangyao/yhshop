<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Goods;
use App\Http\Models\Home\Brands;
use App\Http\Models\Home\Categorys;

class ListController extends Controller
{

    /*
    * 列表页
    * @author taidmin
    * @return 返回列表页视图
    */
    public function index($id)
    {

    	//获取所有品牌
    	$brands = Brands::all();
    	//获取所有分类
    	$cates = Categorys::where('pid',0)->get();


    	$data = Goods::where('cid',$id)->where('status',1)->where('number','>',0)->paginate(8);

    	// dd($data);
    	// return view('home.list',compact('data'));
    	return view('home.list',['data'=>$data,'brands'=>$brands,'cates'=>$cates]);
    }


    /*
    * 搜索页
    * @author taidmin
    * @return 返回搜索页视图
    */
   public function search(Request $request)
   {
        //获取搜索条件,只显示状态为1上架的商品
        $keyword = $request->input('keyword','');

        //获取所有品牌
        $brands = Brands::all();
        //获取所有分类
        $cates = Categorys::where('pid',0)->get();

        $data = Goods::where('name','like','%'.$keyword.'%')->where('status',1)->where('number','>',0)->paginate(8);
        // dd($data);

        return view('home.search',['data'=>$data,'where'=>['keyword'=>$keyword],'brands'=>$brands,'cates'=>$cates]);
   }

}
