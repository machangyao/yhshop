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
        return view('admin.good.index',['title'=>$title]);
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
        // 添加到数据库
        $data = new Goods;
        $data->cid = $input['id'];
        $data->name = $input['name'];
        $data->price = $input['price'];
        $data->market_price = $input['market_price'];
        $data->brand = $input['brand'];

        dd($data);

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
