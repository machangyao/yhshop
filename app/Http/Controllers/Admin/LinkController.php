<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Admin\Links;
class LinkController extends Controller
{
    /**
     * 友情连接
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
         $link = Links::orderBy('link_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('keywords1');
                if(!empty($username)) {
                    $query->where('link_text','like','%'.$username.'%');
                }
            })
            ->paginate($request->input('num', 5));
        return view('admin/link/index',['link'=>$link, 'request'=> $request]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加页面
        return view('admin.link.add');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(Request $request)
    {
        //获取添加数据
        $input = $request->except('_token');

        //验证数据
        $rule = [
            'link_url'=>'required',
            'link_text'=>'required',
         
        ];

        //提示信息
        $mess = [
            'link_url.required'=>'连接不能为空',

            'link_text.required'=>'描述不能为空',

            
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){

            return redirect('admin/kink/create')
                ->withErrors($Validator)
                ->withInput(); 
        }



        //添加操作
        $res = Links::create($input);
        //判断是否添加成功
        if($res){
            //如果添加成功
            return redirect('admin/link');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //返回一个编辑页面
    public function edit($id)
    {
        //编辑页面
        //查出要修改的数据
        $link = Links::find($id);
        //把数据传到页面
        return view('admin.link.edit',compact('link'));
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
        //获取传送过来的数据
        $input = $request->except('_token');



         //验证数据
        $rule = [
            'link_url'=>'required',
            'link_text'=>'required',
           
        ];

        //提示信息
        $mess = [
            'link_url.required'=>'连接不能为空',
            'link_text.required'=>'文字描述不能为空',
           
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/link/'.$id.'/edit')
                ->withErrors($Validator)
                ->withInput(); 
        }

        //获取该条数据
        $ads = Links::find($id);
        //修改
        $res = $ads->update($input);

        //判断
        if($res){
            return redirect('admin/link');
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
        //获取要删除的数据
         $res = Links::find($id)->delete();

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
