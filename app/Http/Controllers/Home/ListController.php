<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    /*
	* 列表页
	* list
    */
    public function list()
    {
    	return view('home.list');
    }
}
