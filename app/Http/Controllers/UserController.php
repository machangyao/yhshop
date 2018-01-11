<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户

	// 用户添加
	public function create(){
		return view('add');
	} 

}
