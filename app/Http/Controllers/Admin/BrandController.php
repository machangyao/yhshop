<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Brands;

class BrandController extends Controller

use DB;
use App\Http\Models\Admin\Brands;


class BrandController extends Controller
{
    /*
    * 品牌列表
    * @author taidmin
    * @return 返回品牌列表视图
    */
    public function index(Request $request)
    {


        //获取搜索条件
        $keyword = $request->input('keyword','');
        $num = $request->input('num','8');

        $title = "品牌列表";
        $data = Brands::where('name','like','%'. $keyword .'%')->paginate($num);
        return view('admin.brand.index',['title'=>$title,'data'=>$data,'where'=>['keyword'=>$keyword,'num'=>$num]]);


    }

    /*
    * 添加品牌
    * @author taidmin
    * @return 返回添加品牌视图
    */
    public function create()
    {

        //
        $title = "添加品牌";
        return view('admin.brand.create',['title'=>$title]);


        //添加
        $title = "添加品牌";
        return view('admin.brand.create',['title'=>$title]);

    }

    /*
    * 执行添加品牌
    * @author taidmin
    */
    public function store(Request $request)
    {
        //

        $input = $request->except('_token');
        $data = new Brands;
        $data -> name = $input['name'];
        $data -> url = $input['url'];
        $res = $data -> save();
        if($res)
        {
            return redirect('/brand')->with('info','添加成功');

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

    /*
    * 修改品牌
    * @author taidmin
    * @return 返回修改品牌视图
    */
    public function edit($id)
    {
        //
        $title = '修改品牌';
        $data = Brands::find($id);
        return view('admin.brand.edit',['title'=>$title,'data'=>$data]);
    }

    /*
    * 执行更新
    * @author taidmin
    */
    public function update(Request $request, $id)
    {
        //
        $input = $request->except('_token','_method');
        $data = Brands::find($id);
        $res = $data->update($input);
        if($res)
        {
            return redirect('brand/')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
    }

    /*
    * 删除品牌
    * @author taidmin
    * @return 返回状态数组
    */
    public function destroy($id)
    {
        //删除
        $res = Brands::find($id)->delete();
        if($res)
        {
            $data = [
                'status'=>1,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>0,
                'message'=>'删除失败'
            ];
        }

        return $data;
    }
}
