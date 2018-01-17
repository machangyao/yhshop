<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /*
	* 详情页
	* show
    */
    public function show()
    {
    	return view('home.show');
    }
}
