<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Goods;
use DB;


class ShowController extends Controller
{

    /*
    * 详情页
    * @author taidmin
    * @return 返回商品详情页视图
    */

    public function show($id)
    {
    	$data = Goods::find($id);

        $cid = Goods::where('id',$id)->first();
        $cid = $cid->cid;
        // dd($cid);

        //面包屑导航
        $navs = DB::select("select C1.name as 'one',C2.name as 'two',C3.name as 'three' from categorys as C1 INNER JOIN categorys as C2 on C1.id = C2.pid INNER JOIN categorys as C3 on C2.id = C3.pid where C3.id = ?",[$cid]);
        // dd($navs);

    	return view('home.show',compact('data','navs'));

    }
}
