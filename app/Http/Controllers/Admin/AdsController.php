<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Ads;


class AdsController extends Controller
{
    /**
     * 广告表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = Ads::get();
        return view('admin/ads/index',['ads'=>$ads]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加

        return view('admin/ads/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //
    public function store(Request $request)
    {
        //执行添加
        //获取提交数据
        $input = $request->except('_token');
        
         // 请求中是否携带上传图片
       if($request->file('ads_img')){
           //获取上传图片文件
            $file = $request->file('ads_img');
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
                $input['ads_img'] = $url;
            }
        }


        //验证数据
        $rule = [
            'ads_url'=>'required',
            'ads_img'=>'required',
            'ads_text'=>'required',
        ];

        //提示信息
        $mess = [
            'ads_url.required'=>'连接不能为空',
            'ads_img.required'=>'图片不能为空',
            'ads_text.required'=>'文字描述不能为空',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/ads/create')
                ->withErrors($Validator)
                ->withInput(); 
        }



        //添加操作
        $res = Ads::create($input);
        //判断是否添加成功
        if($res){
            //如果添加成功
            return redirect('admin/ads');
        }else{
            //如果添加失败，返回到添加页
            return back();
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

     * 
     *广告编辑
     * return 一个页面
     */
    //编辑
    public function edit($id)
    {
        //1 通过传过来的id获取到要修改的用户记录
        $ads = Ads::find($id);

        return view('admin.ads.edit',compact('ads'));

    }

    /**
     * Update the specified resource in storage.
     *

     * 
     * 执行修改
     * 
     */
    public function update(Request $request, $id)
    {
        //获取传来的数据
        $input = $request->except('_token');

          // 请求中是否携带上传图片
       if($request->file('ads_img')){
           //获取上传图片文件
            $file = $request->file('ads_img');
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
                $input['ads_img'] = $url;
            }
        }

         //验证数据
        $rule = [
            'ads_url'=>'required',
            'ads_text'=>'required',
           
        ];

        //提示信息
        $mess = [
            'ads_url.required'=>'连接不能为空',
            'ads_text.required'=>'文字描述不能为空',
           
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/ads/'.$id.'/edit')
                ->withErrors($Validator)
                ->withInput(); 
        }

        //获取该条数据
        $ads = Ads::find($id);
        //修改
        $res = $ads->update($input);

        //判断
        if($res){
            return redirect('admin/ads');
        }else{
            //如果添加失败，返回到修改页
            return back();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //删除
    public function destroy($id)
    {
          //删除
        $res = Ads::find($id)->delete();

        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        return $data;
    }

}
