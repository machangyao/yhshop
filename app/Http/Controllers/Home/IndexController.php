<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Categorys;

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

    	return view('home.index',compact('cates'));
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
