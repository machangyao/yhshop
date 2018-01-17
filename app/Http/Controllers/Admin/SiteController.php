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

    public function edit(){

    	$site = Site_config::where('site_id','1')->first();
    	return view('admin.site.edit',['site'=>$site]);
    }

    public function syore(Request $request){
    	//获取信息
    	$input = $request->except('_token');

    	//要更改的数据
    	$site_config = Site_config::find(1);

    	//修改
    	$res = $site_config->update(['site_keyword'=>$input['site_keyword'],'site_describe'=>$input['site_describe'],'site_copyright'=>['site_copyright']]);


    }
}
