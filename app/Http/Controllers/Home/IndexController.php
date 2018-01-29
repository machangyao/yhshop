<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Categorys;
use App\Http\Models\Home\Goods;

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
    	$cate = Categorys::all();
    	$cates = $this->findSubTree($cate,0,0);
    	
        //获取商品
        $data = Goods::where('cid',34)->orderBy('id','asc')->take(6)->get();
        $data1 = Goods::where('cid',34)->orderBy('id','desc')->take(6)->get();

    	return view('home.index',compact('cates','data','data1'));
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
