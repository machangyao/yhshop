<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Home\Site_config;
class SiteController extends Controller
{
    //1-16 18:58
    //网站配置信息
    public function index(){
        
    	$site = Site_config::get();
    	return view('admin.site.site_index' , ['site'=>$site]);
    }


    //编辑页面
    public function edit(){

    	$site = Site_config::where('site_id','1')->first();
    	return view('admin.site.edit',['site'=>$site]);
    }


    //执行编辑
    public function syore(Request $request){
    	//获取信息
    	$input = $request->except('_token');

    	  //验证数据
        $rule = [
            'site_keyword'=>'required',
            'site_describe'=>'required',
            'site_copyright'=>'required',
            'site_logo'=>'required',
        ];

        //提示信息
        $mess = [
            'site_keyword.required'=>'网站关键字不能为空',
            'site_describe.required'=>'网站描述不能为空',
            'site_copyright.required'=>'网站版权声明不能为空',
            'site_logo.required'=>'网站logo图不能为空',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('/admin/site/edit')
                ->withErrors($Validator)
                ->withInput(); 
        }

        //修改记录
        $site = Site_config::find($id);
        $res = $site->update($input);

        
        if($res){
            return redirect('admin/site');
        }else{
            return back()->with('msg','修改失败');

        }
    }
}
