<?php

namespace App\Http\Controllers\home;

use App\Http\Models\Home\collects;
use App\Http\Models\Home\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CollectController extends Controller
{
    //添加收藏 马长遥
    public function create(){

        if(!session('user_info'))
            return redirect('/login');
        $a = collects::where('gid',Input::get('id'))->where('user_id',session('user_info')['id'])->first();
        if($a)
            return back();
        $data['gid'] = Input::get('id');
        $data['user_id'] = session('user_info')['id'];
        $res = collects::insert($data);
        if($res){
            return back();
        }
    }

    public function index(){
        $data = User::find(session('user_info')['id'])->collect;
        return view('home.user.collect',compact('data'));
    }

    public function del(Request $request){
        $data = $request->except('_token');
        $res = collects::where('gid',$data['gid'])->where('user_id',$data['user_id'])->delete();
        if($res){
            return 'ok';
        }else{
            return 'no';
        }
    }
}
