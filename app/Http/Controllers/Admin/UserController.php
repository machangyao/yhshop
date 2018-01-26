<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //1.获取所有的数据,显示到列表中
        // $data = User::get();


        //2.获取分页数据

        $data = User::orderBy('id','asc') -> paginate(6);
        // return view('admin.user.list',compact('data'));
        //3.单条件搜索
        $input = $request -> input('keywords');
        $data = User::where('nickname' , 'like' , '%' .$input. '%') -> paginate(6);
        return view('admin.user.list',compact('data','input'));
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
       //  $input = $request ->all();
       // dd($input);
        $input = $request->except('_token','re-password');
        //2.检测表单验证规则
        dd
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

           //处理上传
    if($request->hasFile('avatar'))
    {
        $file = $request->file('avatar');
        if($file->isValid())
        {
            //处理
            $ext = $file->getClientOriginalExtension();
            $filename=time().mt_rand(10000,99999).'.'.$ext;
            // dd($filename);
            $res= $file->move('./uploads',$filename);
            if($res)
            {
                $input['avatar'] = $filename;
            }else
            {
                $input['avatar'] = 'default.jpg';
            }
        }else
        {
            $input['avatar']='default.jpg';
        }
    }else
    {
        $input['avatar'] = 'default.jpg';
    }
       
    
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
        //通过传过来的id获取到要修改的用户
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
        $input = $request -> except('_token','_method','updated_at');
         //处理上传
    if($request->hasFile('avatar'))
    {
        $file = $request->file('avatar');
        if($file->isValid())
        {
            //处理
            $ext = $file->getClientOriginalExtension();
            $filename=time().mt_rand(10000,99999).'.'.$ext;
            $res= $file->move('./uploads',$filename);
            if($res)
            {
                  //删除原图片
                $oldPic = User::where('id',$id)->first()->avatar;
                 if($oldPic != 'default.jpg')
                {
                    //dd($oldPic);
                   //  unlink('./uploads/'.$oldPic);
                }
               
                $input['avatar'] = $filename;
            }
        }
      }
        //使用模型修改表记录的方法
        $res = User:: where('id',$id) -> update($input);
        if($res){
            return redirect('admin/user');
        }else{
            return back() -> with('msg', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = User::find($id) -> delete();
        if($res){
            $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        }else{

            $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }
            return $data;
    }
}
