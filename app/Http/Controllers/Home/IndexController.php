<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Categorys;
use App\Http\Models\Admin\Ads;
use App\Http\Models\Admin\Articles;
use App\Http\Models\Home\Slides;
use App\Http\Models\Home\Site_config;
use App\Http\Models\Admin\Links;

class IndexController extends Controller
{

    /*
    * 前台首页
    * @author taidmin
    * @return 返回首页视图
    */
    public function index()
    {
    	//获取所有一级父类
    	// $cates = Categorys::where('pid',0)->get();
    	// dd($cate);
    	$cate = Categorys::all();
    	
    	$cates = $this->findSubTree($cate,0,0);
    	// dd($cates[0]);

        //获取轮播图
        $slide = Slides::all();
        //获取广告
        $ads = Ads::all();
        //获取文章
        $article = Articles::all();
        //获取网站配置信息
        $site = Site_config::all();
        //获取友情连接
        $link = Links::all();
    	return view('home.index',compact('cates','slide','ads','article','link','site'));
    }


    /*
    * 递归获取子分类
    * @author taidmin
    * @return 返回子孙数组
    */
    function findSubTree($cates,$id=0,$lev=1){
        $subtree = [];//子孙数组
        foreach ($cates as $v) {
            if($v->pid==$id){
                $v->lev = $lev;
                $subtree[] = $v;
                $subtree = array_merge($subtree,$this->findSubTree($cates,$v->id,$lev+1));
            }
        }
        return $subtree;

    }

}
