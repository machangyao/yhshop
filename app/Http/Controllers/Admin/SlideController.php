<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Models\Home\Slides;
class SlideController extends Controller
{
    /**
     * 轮播图
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $slide = Slides::orderBy('slide_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('keywords1');
                if(!empty($username)) {
                    $query->where('slide_text','like','%'.$username.'%');
                }
            })
            
            ->paginate($request->input('num', 5));
        return view('admin/slide/slide1',['slide'=>$slide, 'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        //添加页面
        return view('admin/slide/slide_add');
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(Request $request)
    {
        //获取提交数据
        $input = $request->except('_token');
       // 请求中是否携带上传图片
       if($request->file('slide_mig')){
           //获取上传图片文件
            $file = $request->file('slide_mig');
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
                $input['slide_mig'] = $url;
            }
        }
        //验证数据
        $rule = [
            'slide_url'=>'required',
            'slide_text'=>'required',
            'slide_mig'=>'required',
        ];

        //提示信息
        $mess = [
            'slide_url.required'=>'连接不能为空',
            'slide_text.required'=>'文字描述不能为空',
            'slide_mig.required'=>'图片不能为空',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/slide/create')
                ->withErrors($Validator)
                ->withInput(); 
        }

        //添加操作
        $res = Slides::create($input);
        return redirect('admin/slide');
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
    //跳转到修改页面
    public function edit($id)
    {
        //编辑

        $slide = Slides::find($id);
        return view('admin/slide/slide_edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行修改
    public function update(Request $request, $id)
    {
        
        //获取表单
        $input = $request->except('_token','_method');
        // dd($input);
        // 请求中是否携带上传图片
        if($request->file('slide_mig')){
           //获取上传图片文件
            $file = $request->file('slide_mig');
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
                $input['slide_mig'] = $url;
            }
        }
         //验证数据
        $rule = [
            'slide_url'=>'required',
            'slide_text'=>'required',
            'slide_mig'=>'image',
        ];

        //提示信息
        $mess = [
            'slide_url.required'=>'连接不能为空',
            'slide_text.required'=>'文字描述不能为空',
            'slide_mig.image'=>'上传文件必须是图片',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/slide/'.$id.'/edit')
                ->withErrors($Validator)
                ->withInput(); 
        }
        //修改记录
        $slide = Slides::find($id);
        $res = $slide->update($input);

        if($res){
            return redirect('admin/slide');
        }else{
            return back()->with('msg','修改失败');

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
        //删除
        $res = Slides::find($id)->delete();

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

    //ajax图片
    public function upload(Request $request)
    {
        
        //请求中是否携带上传文件
        if($request->hasFile('file_upload')){
            //获取上传文件
            $file = $request->file('file_upload');
            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
              //生成新的唯一上传文件名
                $newName = md5(date('YmdHis').mt_rand(1000,9999).uniqid()).'.'.$entension;
                //将文件移动到指定的位置
                $path = $file->move(public_path().'\uploads',$newName);
                //返回上传的文件在服务器上的保存路径，给浏览器显示上传图片
                $filepath = '/uploads'.'/'.$newName;
                return  $filepath;
            }
        }
    }

    //ajax状态 
    public function state(Request $request)
    {
        //
        $data = $request->state;
        return $data;

    }
}