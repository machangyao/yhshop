<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Goods;

class GoodController extends Controller
{
    public function upload()
    {
        //获取上传的文件对象
        $file = Goods::file('file_upload');
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move(base_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            //返回文件的路径
            return  $filepath;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "商品列表";
        $data = Goods::all();
        return view('admin.good.index',['title'=>$title,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "添加商品";
        $cates = \DB::select("select *,concat(path,id,',') path from categorys order by path");
        $brands = \DB::table("brands")->get();

        return view('admin.good.create',['title'=>$title,'cates'=>$cates,'brands'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取提交的数据
        $input = $request->except('_token');
        // 添加到商品数据库
        $data = new Goods;
        $data->cid = $input['id'];
        $data->name = $input['name'];
        $data->price = $input['price'];
        $data->market_price = $input['market_price'];
        $data->bid = $input['bid'];
        $data->sn = $input['sn'];
        $data->number = $input['number'];
        $data->pic = $input['pic'];
        $data->keyword = $input['keyword'];
        $data->description = $input['description'];
        $data->desc = $input['content'];


        //判断是否上传文件
        if($request->hasFile('pic'))
        {
            //判断是否上传成功
            $file = $request->file('pic');
            if($file->isValid())
            {
                //获取文件扩展名
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(100000,999999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                if($res)
                {
                    $data->pic = $filename;
                }else{
                    $data->pic = 'default.jpg';
                }
            }else{
                $data->pic = 'default.jpg';
            }
        }else{
            $data->pic = 'default.jpg';
        }


        $res = $data->save();
        if($res)
        {
            return redirect('good/')->with('info','商品添加成功');
        }else{
            return back()->with('info','商品添加失败');
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
