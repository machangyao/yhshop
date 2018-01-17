<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\User;
use Illuminate\Support\Facades\Crypt;

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

    public function fgedit($email){
        return view('home.fgedit',['email'=>$email]);
    }

    public function dofgedit(Request $request){

        $this->validate($request, [
                'user_password' => 'required|',
                'repassword' => 'required|same:user_password',
        ],$messages = [
            'user_password.required'      => '密码不能为空',
            'repassword.required'      => '确认密码不能为空',
            'repassword.same'      => '确认密码不正确',
        ]);
        $email = $request->input('email');
        $data['user_password'] = Crypt::encrypt($request->input('user_password'));
        $res = User::where('user_email',$email)->update($data);
        if($res){
            return redirect('/login');
        }else{
            return back();
        }
    }
}
