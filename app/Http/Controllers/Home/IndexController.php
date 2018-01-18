<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Home\Categorys;

class IndexController extends Controller
{
    /*
	* 首页
	* index
    */
    public function index()
    {
    	//获取所有一级父类
    	$cate = Categorys::where('pid',0)->get();
    	// dd($cate);
    	$subcate = $this->findSubTree($cate,0,3);
    	// dd($subcate);

    	return view('home.index',['cate'=>$cate,'subcate'=>$subcate]);
    }


    //递归获取子分类
    protected function findSubTree($cates,$id=0,$lev=1){
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
