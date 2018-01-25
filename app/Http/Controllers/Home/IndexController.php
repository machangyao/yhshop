<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Models\Home\Site_config;
use App\Http\Models\Home\Slides;
class IndexController extends Controller
{
    //
    public function index(){
    	$site = Site_config::get();
    	$slides = Slides::get();
    	return view('home.index',['site'=>$site],['slides'=>$slides]);
    }

}
