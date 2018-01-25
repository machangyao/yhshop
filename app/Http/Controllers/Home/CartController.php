<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //购物车页面
    public function index()
    {
    	return view('home.cart');
    }
}
