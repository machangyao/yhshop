<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\User;
use Illuminate\Support\Facades\Crypt;
use Gregwar\Captcha\CaptchaBuilder; 
use Gregwar\Captcha\PhraseBuilder;

use Illuminate\Support\Facades\Input;

use Session;
use Illuminate\Support\Facades\Cookie;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户详情页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     /*
     * 返回注册页面
     * @author 马长遥
     * @datetime 20180111 20:26
     * @param null
     * @return 返回一个前台的注册页面视图
     */
        return view('home.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*
     * 返回提交注册
     * @author 马长遥
     * @datetime 20180111 20:26
     * @param 用户注册信息
     * @return 返回一个前台的提交注册
     */
        if(strlen($request->input('user_tel')) != 11){
            return back()->with('size','手机号必须11位');
        }
        
        $this->validate($request, [
            'user_password' => 'required|',
            'user_email' => 'required|email',
            'user_tel' => 'required|numeric',
            'repassword' => 'required|same:user_password',
        ],$messages = [
            'user_name.required'     => '账号不能为空',
            // 'user_name.min'      => '账号最小5',
            'user_name.max' => '账号最大20',
            'user_email.required'      => '邮箱不能为空',
            'user_email.email'      => '邮箱不正确',
            'user_tel.required'      => '电话不能为空',
            'user_tel.numeric'      => '电话不正确',
            'user_password.required'      => '密码不能为空',
            'repassword.required'      => '确认密码不能为空',
            'repassword.same'      => '确认密码不正确',
        ]);
        

        $data = $request->except('_token','repassword');
        $tel = User::where('user_tel',$data['user_tel'])->first();
        if($tel){
            return back()->with('tel','手机号已注册');
        }
        $email = User::where('user_email',$data['user_email'])->first();
        if($email){
            return back()->with('email','邮箱已注册');
        }
        $data['create_at'] = date('Y-m-d H:i:s',time());
        $data['user_status'] = 1;
        $data['user_password'] = Crypt::encrypt($data['user_password']);
        $data['avatar'] = '/yh/home/images/getAvatar.do.jpg';
        $res = User::insert($data);

        if($res){
            return redirect('/login')->with('msg','注册成功');
        }else{
            return back()->with('msg','注册失败');
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

    public function ajax(Request $request){
        $name = $request->input('user_name');
        $res = User::where('user_name',$name)->first();
        if ($res) {
            # code...
            return 1;
        }else{
            return 0;
        }
    }

    public function login(){
        // if(Cookie::get('user_info')){
        //     Session::put('user_info',Cookie::get('user_info'));
        //     return back();
        // }
        if(session('user_info')){
            return redirect('/');
        }

        if(!session('back')){
            Session::put('back',Input::get('url'));
        }

        return view('Home.login');
    }

    public function dologin(Request $request){

          /*
         * 返回提交登陆
         * @author 马长遥
         * @datetime 20180111 20:26
         * @param 用户登陆
         * @return 返回一个前台的提交登陆
         */
        $data = $request->except('_token','captcha');
        $this->validate($request, [
                'user_name' => 'required|',
                'user_password' => 'required|',
                'captcha' => 'required|',
        ],$messages = [
            'user_name.required'     => '账号不能为空',
            'captcha.required'      => '验证码不能为空',
            'user_password.required'      => '密码不能为空',
        ]);

        if(strtolower($request->input('captcha')) != strtolower(session('code'))){
            return back()->with('yzm','验证码错误')->with('user_name',$request->input('user_name'));
        }
        $res = User::where('user_name',$data['user_name'])->first();
        $res2 = User::where('user_tel',$data['user_name'])->first();
        $res3 = User::where('user_email',$data['user_name'])->first();
        if($res){
            if(Crypt::decrypt($res['user_password'])==$data['user_password']){
                if($data['remember']=='yes'){
                    cookie::queue("user_name",$data['user_name'],time()+3600*24*365);
                    cookie::queue("user_password",$data['user_password'],time()+3600*24*365);
                }
                Session::put('user_info',$res);



                if(session('back')){
                    return redirect(session('back'));
                }else{
                    return redirect('/');
                }
            }
        }elseif($res2){
            if(Crypt::decrypt($res2['user_password'])==$data['user_password']){
                if($data['remember']=='yes'){
                    cookie::queue("user_name",$data['user_name'],time()+3600*24*365);
                    cookie::queue("user_password",$data['user_password'],time()+3600*24*365);
                }
                Session::put('user_info',$res2);
                if(session('back')){
                    return redirect(session('back'));
                }else{
                    return redirect('/');
                }
            }
        }elseif($res3){
            if(Crypt::decrypt($res3['user_password'])==$data['user_password']){
                if($request->input('remember')=='yes'){
                    cookie::queue("user_name",$data['user_name'],time()+3600*24*365);
                    cookie::queue("user_password",$data['user_password'],time()+3600*24*365);
                }
                Session::put('user_info',$res3);
                if(session('back')){
                    return redirect(session('back'));
                }else{
                    return redirect('/');
                }
            }
        }
        
        return back()->with('yz','账号或密码错误');
    }

    // 验证码生成
    public function captcha($tmp)
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    

}
