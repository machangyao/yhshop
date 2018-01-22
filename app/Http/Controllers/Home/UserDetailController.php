<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\Http\Models\Home\User;
class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.user.userdetail');        
        
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
        //
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
        $data = $request->except('_token','_method');
        $tel = User::where('user_tel',$data['user_tel'])->first();
        if($data['user_tel'] == Session('user_info')['user_tel']){
            unset($data['user_tel']);
        }else{
            if($tel){
                return back()->with('tel','手机号已注册');
            }
        }
        $birthday = $data['year'].'-'.$data['month'].'-'.$data['day'];
        unset($data['year']);
        unset($data['month']);
        unset($data['day']);
        $data['birthday'] = $birthday;
        if(!$data['avatar']){
            $data['avatar'] = session('user_info')['avatar'];
        }
//        dd($data);
        $res = User::where('id',$id)->update($data);
        $user = User::where('id',$id)->first();
        if($res){
            Session::put('user_info',$user);
            return redirect('/userdetail');
        }else{
            return back();
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
        //
    }

    public function mycenter(){
        return view('home.user.userdata');
    }

    public function upload(Request $request)
    {

        //请求中是否携带上传文件
        if($request->hasFile('file_upload')){

//            获取上传文件
            $file = $request->file('file_upload');

            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名

//              生成新的唯一上传文件名
                $newName = md5(date('YmdHis').mt_rand(1000,9999).uniqid()).'.'.$entension;

//                1. 将文件上传到本地服务器

               // 将文件移动到指定的位置
                $path = $file->move(public_path().'/uploads',$newName);

//                返回上传的文件在服务器上的保存路径，给浏览器显示上传图片
                $filepath = '/uploads'.'/'.$newName;
                return  $filepath;
            }
        }

    }

    public function lgout(){
        session()->flush();
        return redirect('/login');
    }
}
