<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HTTP\Models\Admin\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.接收表单提交过来的参数

        //2.检测表单验证规则

           $this->validate($request, [
                'nickname' =>'required|min:6|max:18',
                'password' => 'required|min:6|max:18',
                're-password'=>'required|same:password',
                'tel'=>'required|size:11',
                'email'=>'required|email',
                'avatar' => 'image',
            ],[
                  'nickname.min' => '用户名不能小于6位',
                  'nickname.max'=>'用户名不能大于18位',
                  'nickname.required' => '用户名不能为空',
                  'password.required' => '密码不能为空',
                  'password.min'=>'密码不能小于6位',
                  'password.max'=>'密码不能大于18位',
                  're-password.required' => '确认密码不能为空',
                  're-password.same'=>'确认密码是否一致',
                  'tel.required'=>'手机号不能为空',
                  'tel.size' => '手机号必须是11位',
                  'email.email' =>' 邮箱不合法',
                  'email.required' =>' 邮箱不能为空',
                  'avatar.image' =>'请上传一张正确的图片'
             ]);
       $input = $request->except('_token','re-password');

        //3.将提交的数据添加到user表中
        //向数据表中添加数据
        $input['password'] = Crypt::encrypt($input['password']);
        $res = User::insert($input);
        //4.判断是否添加成功
        if($res){
            //如果添加成功,跳转到列表页
            return redirect('admin/user') -> with('msg','添加成功');
        }else{
            //如果添加失败,返回到添加页
            return back() -> with('msg','添加失败');
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
