<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Home\collects;
use App\Http\Models\Home\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Home\Site_config;
use App\Http\Models\Admin\Links;
class CollectController extends Controller
{
    //
    public function create(){
        if(!session('user_info')){
            Session::put('back',Input::get('url'));
            return redirect('/login');
        }
        $data['gid'] = Input::get('gid');
        $data['user_id'] = session('user_info')['id'];
        $res = collects::where('user_id',$data['user_id'])->where('gid',$data['gid'])->first();
        if($res){
            return back();
        }
        collects::insert($data);
        return back();

    }

    public function index(){

        $data = User::find(session('user_info')['id'])->collects;

        //获取网站配置信息
        $site = Site_config::all();
        //获取友情连接
        $link = Links::all();        
        return view('home.user.collect',compact('data','site','link'));

    }

    public function del(){
        $id = Input::get('cid');
        $res = collects::find($id)->delete();
        if($res){
            return back();
        }
    }
}
