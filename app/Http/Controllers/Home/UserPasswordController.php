<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Home\User;
use App\Http\Models\Home\Site_config;
use App\Http\Models\Admin\Links;
class UserPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //返回修改密码页面
        //获取网站配置信息
        $site = Site_config::all();
        //获取友情连接
        $link = Links::all();
        return view('home.user.password',compact('site','link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行修改密码

        $this->validate($request, [
            'newpassword' => 'required|',
            'oldpassword' => 'required|',
            'repassword' => 'required|same:newpassword',
        ],$messages = [
            'oldpassword.required'     => '原密码不能为空',
            'newpassword.required'      => '新密码不能为空',
            'repassword.required'      => '确认密码不能为空',
            'repassword.same'      => '确认密码不正确',
        ]);
        $data = $request->input('newpassword');
        if(!Crypt::decrypt(session('user_info')['user_password']) == $data){
            return back()->with('psw','原密码不正确');
        }
        $data = Crypt::encrypt($data);
        $res = User::where('id',session('user_info')['id'])->update(['user_password'=>$data]);
        if($res){
            return redirect('/user/lgout');
        }else{
            return back()->with('psw','修改失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
