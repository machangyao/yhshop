<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Goods;


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
    	return view('home.show',compact('data'));

    }
}
