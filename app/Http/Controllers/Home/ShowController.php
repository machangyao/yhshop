<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Goods;
use App\Http\Models\Home\Site_config;
use App\Http\Models\Admin\Links;

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
        //获取网站配置信息
        $site = Site_config::all();
        //获取友情连接
        $link = Links::all();
    	return view('home.show',compact('data','site','link'));

    }
}
