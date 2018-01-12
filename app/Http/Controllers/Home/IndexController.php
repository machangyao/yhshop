<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /*
	* 首页
	* index
    */
    public function index()
    {
    	return view('home.index');
    }

}
