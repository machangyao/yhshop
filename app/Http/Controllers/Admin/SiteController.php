<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Site_config;
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

        // 请求中是否携带上传图片
       if($request->file('site_logo')){
           //获取上传图片文件
            $file = $request->file('site_logo');
            // 判断上传文件的有效性
            if($file->isValid()) {
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
                // 生成新的文件名
                $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
                // 将文件移动到指定位置
                $path = $file->move(public_path().'/uploads',$newName);
                // 返回上传文件图片  显示到浏览器上面
                $url ='/uploads/'.$newName;
                // 把所保存的图片位置放入到字段中去
                $input['site_logo'] = $url;
            }
        }

    	  //验证数据
        $rule = [
            'site_keyword'=>'required',
            'site_describe'=>'required',
            'site_copyright'=>'required',
        ];

        //提示信息
        $mess = [
            'site_keyword.required'=>'网站关键字不能为空',
            'site_describe.required'=>'网站描述不能为空',
            'site_copyright.required'=>'网站版权声明不能为空',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('/admin/site/edit')
                ->withErrors($Validator)
                ->withInput(); 
        }

        //修改记录
        $site = Site_config::find(1);
        $res = $site->update($input);

        
        if($res){
            return redirect('admin/site');
        }else{
            return back()->with('msg','修改失败');

        }
    }
}
