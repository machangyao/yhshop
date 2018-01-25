<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Goods;


class ShowController extends Controller
{
    /*
	* 详情页
	* show
    */

    public function show($id)
    {
    	$data = Goods::find($id);
    	return view('home.show',compact('data'));

    }
}
