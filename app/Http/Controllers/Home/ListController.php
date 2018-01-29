<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Goods;
use App\Http\Models\Home\Brands;
use App\Http\Models\Home\Categorys;
use DB;
use App\Http\Models\Home\Site_config;
use App\Http\Models\Admin\Links;

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

        //面包屑导航
        $navs = DB::select("select C1.name as 'one',C2.name as 'two',C3.name as 'three' from categorys as C1 INNER JOIN categorys as C2 on C1.id = C2.pid INNER JOIN categorys as C3 on C2.id = C3.pid where C3.id = ?",[$id]);
        // dd($navs[0]->one);
        //获取网站配置信息
        $site = Site_config::all();
        //获取友情连接
        $link = Links::all();

    	$data = Goods::where('cid',$id)->where('status',1)->where('number','>',0)->paginate(8);

    	// dd($data);
    	// return view('home.list',compact('data'));

    	return view('home.list',['data'=>$data,'navs'=>$navs,'brands'=>$brands,'cates'=>$cates,'link'=>$link,'site'=>$site]);
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
