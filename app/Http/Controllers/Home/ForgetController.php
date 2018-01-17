<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
    //
		public function forget(){
        return view('home.forget');
    }

    public function doforget(Request $request){
        $email = $request->input('user_email');
        \Mail::send('email.forget',['email'=>$email],function($msg) use($email){
            $msg->to($email)->subject('修改密码');
        });
    }

    public function fgedit(){
        return view('home.fgedit');
    }
}
